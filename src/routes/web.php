<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\WorksController;

Route::middleware(['auth'])->group(function () {


    // ログアウト後のリダイレクト先をログインページに変更
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');
});

// 会員登録
Route::get('/register', [RegisteredUserController::class, 'create']) // createメソッドに修正
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register.post');


// 打刻
Route::get('/', [WorksController::class, 'index'])->name('punch');

Route::post('/', [WorksController::class, 'store'])
    ->middleware('auth')
    ->name('punch.post');

// 勤怠管理関連のルート
Route::middleware(['auth'])->group(function () {
    // 日付別勤怠管理ページ
    Route::get('/attendance', [WorksController::class, 'show'])->name('attendance');

    // 勤務開始
    Route::post('/works/start-work', [WorksController::class, 'startWork'])->name('works.startWork');

    // 勤務終了
    Route::post('/works/end-work', [WorksController::class, 'endWork'])->name('works.endWork');

    // 休憩開始
    Route::post('/works/start-break', [WorksController::class, 'startBreak'])->name('works.startBreak');

    // 休憩終了
    Route::post('/works/end-break', [WorksController::class, 'endBreak'])->name('works.endBreak');
});