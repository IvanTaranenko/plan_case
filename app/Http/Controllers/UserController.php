<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        if (! auth()->user() || ! auth()->user()->is_admin) {
            return redirect('/dashboard');
        }

        $users = User::with('domains')->orderBy('created_at', 'desc')->paginate(20);

        return view('pages.users.index', compact('users'));
    }
}
