<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController as FortifyAuthenticatedSessionController;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends FortifyAuthenticatedSessionController
{
    public function index()
{
  return view('index');
}
}