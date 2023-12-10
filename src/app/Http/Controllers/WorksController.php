<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Interval;
use Carbon\Carbon;

class WorksController extends Controller
{
    public function index()
    {
        // ここで勤怠情報や適切なデータをビューに渡して表示するロジックを記述
        return view('index');
    }

    public function startWork(Request $request)
    {
        // 勤務開始の処理
        $work = Work::create([
            'user_id' => auth()->id(),
            'start_time' => now(),
        ]);

        return redirect()->route('attendance');
    }

    public function endWork(Request $request)
    {
        // 勤務終了の処理
        $work = Work::where('user_id', auth()->id())->latest()->first();
        $work->end_time = now();
        $work->save();

        return redirect()->route('attendance');
    }

    public function startBreak(Request $request)
    {
        // 休憩開始の処理
        $interval = Interval::create([
            'user_id' => auth()->id(),
            'start_time' => now(),
        ]);

        return redirect()->route('attendance');
    }

    public function endBreak(Request $request)
    {
        // 休憩終了の処理
        $interval = Interval::where('user_id', auth()->id())->latest()->first();
        $interval->end_time = now();
        $interval->save();

        return redirect()->route('attendance');
    }
}