<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Test Case') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet" />

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app" class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
                <img src="{{ asset('img/sample.png') }}" alt="Logo" style="height: 35px; width: auto;" class="me-2 rounded" />
                <span class="fs-4 fw-bold">{{ config('app.name', 'SampleName') }}</span>
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @auth
                    <ul class="navbar-nav mx-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link @if(request()->routeIs('dashboard')) active @endif" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(request()->routeIs('plans.*')) active @endif" href="{{ route('plans.index') }}">Plans</a>
                        </li>
                        @if (Auth::user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('users.*')) active @endif" href="{{ route('users.index') }}">Users</a>
                            </li>
                        @endif
                    </ul>
                @endauth

                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item d-flex align-items-center gap-3">
                         <span class="me-2 fw-semibold">{{ Auth::user()->name }}</span>
                                <i class="bi bi-person-circle fs-4"></i>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Sign out</button>
                                    </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4 flex-grow-1">
        <div class="container">
            @yield('content')
        </div>
    </main>
</div>

<footer class="bg-primary text-white text-center py-3 mt-auto shadow-sm">
    <div class="container">
        &copy; {{ date('Y') }} <strong>{{ config('app.name', 'SampleName') }}</strong> — All rights reserved.
    </div>
</footer>

<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
/>

</body>
</html>
