@extends('layouts.app')
@section('main')
@guest

    <img class="logo" src="{{ asset('storage/logo1-8.png') }}" alt="Logo" />
    <div class="welcome">
        <a class="welcome-button" href="{{ route('login') }}">{{ __('Login') }}</a>
        <a class="welcome-button" href="{{ route('register') }}">{{ __('Register') }}</a>
    </div>

@endguest
@if(\Illuminate\Support\Facades\Auth::user())


    <img class="logo" src="{{ asset('storage/logo1-8.png') }}" alt="Logo" />
    <div class="welcome">
        <a class="welcome-button" href="{{ route('swipe.show') }}">{{ __('Start matching') }}</a>
        <a class="welcome-button" href="{{ route('profile.show') }}">{{ __('Check your profile') }}</a>
    </div>

@endif
@endsection

