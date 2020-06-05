@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header title">{{ __('My matches') }}</div>
                    <div class="card-body">
                        @foreach($matches->chunk(4) as $matches)
                            <div class="d-flex text-center">
                                @foreach($matches as $match)
                                    <div class="col-3 matches">
                                        <a class="text-decoration-none matches"
                                           href="{{ route('matches.profile', $match) }}">
                                            <div class="card"
                                                 style="background-color: inherit; border: none; margin-bottom: 15px">
                                                <img src="{{ $match->pictures->first()->getPicture() }}" alt="Picture"
                                                     style="width: 150px; height: auto">
                                                {{ $match->profile->fullName }}, {{ $match->profile->age }}
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
