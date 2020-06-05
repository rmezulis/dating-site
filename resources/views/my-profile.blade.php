@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header title">{{ __('My profile') }}
                    </div>
                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col">
                                @include('profile')
                            </div>
                            <div class="col-3">
                                <p>{{ $profile->fullName }}</p>
                                <p>{{ $profile->age }}</p>
                                <p class="small">{{ $profile->country }}</p>
                                @if($profile->bio)
                                    <p style="margin-bottom: 0">Bio:</p>
                                    <p> {{ $profile->bio }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <a class="btn btn-outline-secondary" href="{{ route('profile.edit') }}" style="margin: 5px">Edit
                                profile</a>
                            <a class="btn btn-outline-secondary" href="{{ route('pictures.edit') }}" style="margin: 5px">Edit
                                pictures</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
