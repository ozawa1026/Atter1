<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store()
    {
        return view('login');
    }

    public function destroy()
    {
        return view('login');
    }

}
