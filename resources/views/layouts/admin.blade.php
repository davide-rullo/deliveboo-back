<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        <header class="navbar sticky-top flex-md-nowrap p-2 shadow pe-3">

            <div class="d-none d-md-block">
                <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 d-flex gap-2" href="{{ url('/') }}">
                    <img height="40" src="{{ asset('storage/img/logo.png') }}" alt="">
                    <h2 class="my_logo_title">DeliveBoo</h2>
                </a>
            </div>

            {{-- <div class="d-flex align-items-center">
                <button class="navbar-toggler position-absolute d-md-none collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div> --}}



            <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">

            <ul class="m-0 list-unstyled">
                <li class="nav-item dropstart">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-muted" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>


        </header>

        <div class="container-fluid vh-100">
            <div class="row h-100">

                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                    <div class="position-sticky pt-3">

                        <ul class="nav flex-column">

                            <li class="">
                                <a class="d-md-none nav-link {{ Route::currentRouteName() == '/' ? 'bg-secondary' : '' }}"
                                    href="{{ url('/') }}">
                                    <i class="fa-solid fa-house fa-lg fa-fw"></i> Home
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-muted" href="http://localhost:5174/">
                                    <i class="fa-solid fa-chalkboard-user fa-lg fa-fw"></i> To Guest's View
                                </a>
                            </li>

                            <li class="nav-item">

                                <a class="nav-link text-muted {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                                </a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link text-muted {{ Route::currentRouteName() == 'admin.restaurants.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.restaurants.index') }}">
                                    <i class="fa-solid fa-utensils fa-lg fa-fw"></i> Restaurant
                                </a>

                            </li>

                            <li class="nav-item">

                                {{-- <a class="nav-link text-muted {{ Route::currentRouteName() == 'admin.types.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.types.index') }}">
                                    <i class="fa-solid fa-table-columns fa-lg fa-fw"></i> Types
                                </a> --}}

                            </li>



                        </ul>


                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 p-0 m-0">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>
