<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{asset('resources/js/app.js')}}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <section class="menu">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" text-white href="#">about</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
        </section>



            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
