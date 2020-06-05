@extends('layouts.app')

@guest
@section('main')
    <div class="welcome">
        <a class="welcome-button" href="{{ route('login') }}">{{ __('Login') }}</a>
        <a class="welcome-button" href="{{ route('register') }}">{{ __('Register') }}</a>
    </div>
@endsection
@endguest
@if(\Illuminate\Support\Facades\Auth::user())

@section('content')
    <div class="welcome">
        <a class="welcome-button" href="{{ route('swipe.show') }}">{{ __('Start matching') }}</a>
        <a class="welcome-button" href="{{ route('profile.index') }}">{{ __('Check your profile') }}</a>
    </div>
@endsection
@endif

