<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(RegisterRequest $request)
    {
        $user = $request->only(['name', 'email', 'password']);
        User::create($user);

        return view('login');
    }
}
