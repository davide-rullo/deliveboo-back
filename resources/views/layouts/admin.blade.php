<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/svg+xml" href="{{ asset('storage/img/logo.png') }}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Vite integration -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        <!-- Navbar -->
        <header class="navbar sticky-top flex-md-nowrap p-2 shadow pe-3">
            <div class="d-none d-md-block">
                <!-- Logo and brand -->
                <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 d-flex gap-2" href="{{ url('/') }}">
                    <img height="40" src="{{ asset('storage/img/logo.png') }}" alt="">
                    <h2 class="my_logo_title">DeliveBoo</h2>
                </a>
            </div>

            <!-- Navbar toggler for small screens -->
            <div class="d-flex align-items-center">
                <button class="navbar-toggler position-absolute d-md-none collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span><img height="40" src="{{ asset('storage/img/logo.png') }}" alt=""></span>
                </button>
            </div>

            <!-- User dropdown menu -->
            <ul class="m-0 list-unstyled">
                <li class="nav-item dropstart">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-muted" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <!-- User dropdown content -->
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </header>

        <!-- Main content container with Bootstrap grid system -->
        <div class="container-fluid">
            <div class="row">

                <!-- Sidebar navigation -->
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                    <div class="position-sticky pt-3">

                        <!-- Sidebar content -->
                        <ul class="nav flex-column">

                            <!-- Home link for small screens -->
                            <li class="d-md-none">
                                <a class="nav-link text-muted {{ Route::currentRouteName() == '/' ? 'bg_my_light-pink' : '' }}"
                                    href="{{ url('/') }}">
                                    <i class="fa-solid fa-house fa-lg fa-fw"></i> Home
                                </a>
                            </li>

                            <!-- Other sidebar links -->
                            <li class="nav-item">
                                <a class="nav-link text-muted" href="http://localhost:5174/">
                                    <i class="fa-solid fa-chalkboard-user fa-lg fa-fw"></i> To Guest's View
                                </a>
                            </li>

                            <li class="nav-item">

                                <a class="nav-link text-muted {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg_my_light-pink' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                                </a>

                            </li>

                            <li class="nav-item">

                                <a class="nav-link text-muted {{ Route::currentRouteName() == 'admin.restaurants.index' ? 'bg_my_light-pink' : '' }}"
                                    href="{{ route('admin.restaurants.index') }}">
                                    <i class="fa-solid fa-utensils fa-lg fa-fw"></i> Restaurant
                                </a>

                            </li>

                            <li class="nav-item">

                                {{-- <a class="nav-link text-muted {{ Route::currentRouteName() == 'admin.types.index' ? 'bg_my_light-pink' : '' }}"
                                href="{{ route('admin.types.index') }}">
                                <i class="fa-solid fa-table-columns fa-lg fa-fw"></i> Types
                                </a> --}}

                            </li>


                            @if (isset($restaurant))
                                <li class="nav-item">

                                    <a class="nav-link text-muted {{ Route::currentRouteName() == 'admin.plates.index' ? 'bg_my_light-pink' : '' }}"
                                        href="{{ route('admin.plates.index') }}">
                                        <i class="fa-solid fa-calendar-minus fa-lg fa-fw"></i> Menu
                                    </a>

                                </li>
                            @elseif (Route::currentRouteName() == 'admin.plates.index')
                                <li class="nav-item">

                                    <a class="nav-link text-muted {{ Route::currentRouteName() == 'admin.plates.index' ? 'bg_my_light-pink' : '' }}"
                                        href="{{ url('admin/plates/') }}">
                                        <i class="fa-solid fa-calendar-minus fa-lg fa-fw"></i> Menu
                                    </a>

                                </li>
                            @endif







                        </ul>
                    </div>
                </nav>

                <!-- Main content area -->
                <main class="col-md-9 ms-sm-auto col-lg-10 p-0 m-0">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>
