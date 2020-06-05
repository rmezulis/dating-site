@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if(session('new-match'))
                            <div class="alert alert-success">
                                {{ session('new-match') }}
                                Go to <a href="/matches">your matches</a> to start chatting now!
                            </div>
                        @endif
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            @if($profile !=null)
                                <div class="col">
                                    @include('profile')
                                </div>
                                <div class="col-3">
                                    <p style="margin-bottom: 0">{{ $profile->first_name }}, {{ $profile->age }}</p>
                                    <p class="small">{{ $profile->country }}</p>
                                    <p style="margin-bottom: 0">Bio:</p>
                                    <p> {{ $profile->bio }}</p>
                                </div>
                        </div>
                        <div class="row justify-content-between" style="margin: 10px">
                            <form method="POST" action="{{ route('swipe.pass', $profile->user) }}">
                                @csrf
                                <button type="submit" class="close" style="opacity: 1;font-size: 80px; outline: none;">&times;</button>
                            </form>
                            <form method="POST" action="{{ route('swipe.like', $profile->user) }}">
                                @csrf

                                <button type="submit" class="btn" style="margin-top: 20px; outline: none;">
                                    <div class="heart"></div>
                                </button>

                            </form>
                        </div>
                        @else
                            <p>Looks like you have seen everyone, try changing your settings to see more users!</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
