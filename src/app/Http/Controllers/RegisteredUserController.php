<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;

class RegisteredUserController extends Controller
{
    public function create(RegisterRequest $request)
    {
        $contact = $request->only(['name', 'email', 'password']);
        return view('login', ['contact' => $contact]);
    }

    public function sotre(RegisterRequest $request)
    {
        $contact = $request->only(['name', 'email', 'password']);
        Contact::create($contact);

        return view('login');
}

}
