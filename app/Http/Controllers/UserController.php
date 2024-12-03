<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function users(): View
    {
        return view('pages.user')->with('users', User::all());
    }
}
