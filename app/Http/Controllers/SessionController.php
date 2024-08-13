<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $user = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($user)) {
            throw ValidationException::withMessages([
                'login' => 'Oops, invalid credentials',
            ]);
        }

        $request->session()->regenerate();

        return redirect('/blogs');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
