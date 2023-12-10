<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \App\Http\Requests\RegisterRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegisterRequest $request)
    {
        $user = $request->only(['name', 'email', 'password']);
        User::create($user);

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
}