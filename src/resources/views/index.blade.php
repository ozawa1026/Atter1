@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="attendance__alert">
</div>

<div class="attendance__content">
  <div class="attendance__panel">
  <form class="attendance__button" method="POST" action="{{ route('works.startWork') }}">
    @csrf
    <button class="attendance__button-submit" type="submit">勤務開始</button>
</form>

<form class="attendance__button" method="POST" action="{{ route('works.endWork') }}">
    @csrf
    <button class="attendance__button-submit" type="submit">勤務終了</button>
</form>

<form class="attendance__button" method="POST" action="{{ route('works.startBreak') }}">
    @csrf
    <button class="attendance__button-submit" type="submit">休憩開始</button>
</form>

<form class="attendance__button" method="POST" action="{{ route('works.endBreak') }}">
    @csrf
    <button class="attendance__button-submit" type="submit">休憩終了</button>
</form>
  </div>
  </div>
</div>
@endsection