<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        return view('articles.index')->with('articles', Article::where('active', true)->latest()->paginate(10));
    }
    public function show(Article $article): View
    {
        return view('articles.show', ['article' => $article]);
    }

    public function create(): View
    {
        return view('articles.create');
    }

    public function check_article(): View
    {
        if (! Gate::allows('admin')) {
            abort(403);
        }
        return view('articles.check')->with('articles', Article::where('active', false)->latest()->paginate(10));
    }
    public function publish(Article $article): RedirectResponse
    {
        if (! Gate::allows('admin')) {
            abort(403);
        }

        $article->update(['active' => true]);
        return redirect('/article');
    }
    public function store(ArticleRequest $request): RedirectResponse
    {
        if ($request->hasFile('photo')) {

            $file = $request->file('photo');

            $name = $file->getClientOriginalName();

            $path = basename($file->storeAs('public', $name));
        } else {
            $path = null;
        }

        Article::create([
            'user_id' => auth()->user()->id,
            'active' => false,
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'photo' => $path
        ]);
        return redirect('/article');
    }

    public function edit(Article $article): View
    {
        if (! Gate::allows('writer', Article::find($article->id))) {
            abort(403);
        }
        return view('articles.edit')->with('article', $article);
    }

    public function update(ArticleRequest $request, Article $article): RedirectResponse
    {
        if (! Gate::allows('writer', Article::find($article->id))) {
            abort(403);
        }
        if ($request->hasFile('photo')) {
            if (isset($article->photo)) {
                Storage::delete($article->photo);
            }
            $file = $request->file('photo');
            $name = $file->getClientOriginalName();
            $path = basename($file->storeAs('public', $name));
        } else {
            $path = $article->photo;
        }

        $article->update([
            'active' => $article->active,
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'photo' => $path
        ]);
        return redirect('/article');
    }

    public function destroy(Article $article): RedirectResponse
    {
        if (! Gate::allows('writer', Article::find($article->id))) {
            abort(403);
        }
        if (isset($article->photo)) {
            Storage::delete($article->photo);
        }
        $article->delete();

        return redirect('/article');
    }
}
