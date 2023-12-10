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
    /**
     * Display the login view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function create(Request $request): LoginViewResponse
    {
        return parent::create($request);
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // ユーザーの存在確認
        $user = \App\Models\User::where('email', $request->input('email'))->first();

        if ($user) {
            \Log::info('ユーザー存在確認', [
                'email' => $request->input('email'),
                'user_exists' => 'true',
            ]);

            // ログイン試行
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                \Log::info('ログイン成功');
                $request->session()->regenerate();
                return view('layouts.index');
            } else {
                \Log::error('ログインに失敗しました。', [
                    'email' => $request->input('email'),
                    'error_messages' => 'Auth::attempt 失敗',
                ]);
            }
        } else {
            \Log::error('ユーザー存在確認', [
                'email' => $request->input('email'),
                'user_exists' => 'false',
            ]);
            throw ValidationException::withMessages([
                'email' => ['ログインに失敗しました。'],
            ])->errorBag('login');
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LogoutResponse
     */
    public function destroy(Request $request): LogoutResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->loggedOut($request) ?: redirect('/');
    }
}