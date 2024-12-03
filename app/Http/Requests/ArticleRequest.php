<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'body' => 'required|string|max:1000',
            'photo' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
        ];
    }
}
