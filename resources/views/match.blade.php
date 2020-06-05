@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header title">{{ __($profile->fullName . ', ' . $profile->age) }}
                        <p style="margin: 0; font-size: 18px">{{ $profile->country }}</p>
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
                            @if($profile->bio)
                            <div class="col-3">
                                <p style="margin-bottom: 0">Bio:</p>
                                <p> {{ $profile->bio }}</p>
                            </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
