<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'unique:users,name', 'min:6'],
            'email' => ['required', 'string', 'email', 'max:30', 'unique:users,email'],
            'phone' => ['required', 'numeric', 'min:10', 'unique:users,phone'],
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/blogs');
    }

    public function show(User $user)
    {

    }

    public function edit(User $user)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy()
    {

    }
}
