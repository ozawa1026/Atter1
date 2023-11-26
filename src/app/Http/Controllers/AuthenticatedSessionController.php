<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function sotre()
    {
        return view('sotre');
    }

    public function destroy()
    {
        return view('destroy');
    }
}
