<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;

class RegisteredUserController extends Controller
{
    public function create(RegisterRequest $request)
    {
        $user = $request->only(['name', 'email', 'password']);
        return view('login', ['user' => $user]);
    }

    public function store(RegisterRequest $request)
    {
        $user = $request->only(['name', 'email', 'password']);
        User::create($user);

        return view('login');
}

}
