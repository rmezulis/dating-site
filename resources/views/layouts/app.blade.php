@extends('layouts.main')
@section('main')
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            @if(Auth::user() && Auth::user()->profile)
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->


                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="{{ Auth::user()->pictures()->first()->getPicture() }}"
                                     alt="{{ Auth::user()->profile->first_name }} picture"
                                     style="width: 30px">
                                {{ Auth::user()->profile->fullName }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('matches.all') }}">
                                    {{ __('My matches') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('profile.index') }}">
                                    {{ __('Profile') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('settings.show') }}">
                                    {{ __('Settings') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>
                </div>
            @else
                <div class="mx-auto">
                    <a class="app-title" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
            @endif
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
@endsection
