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
    @yield('css')
</head>
<body>
    <div id="app">
        <section class="menu">
           <h1 class="d-none">{{$user=\Illuminate\Support\Facades\Auth::check()}}</h1>
    @if($user)

            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <!-- Brand -->
                <a class="navbar-brand text-danger"href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('setting.index')}}">setting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route(('slider.index'))}}">slider</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route(('about.index'))}}">about</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route(('gallery.index'))}}">gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route(('news.index'))}}">news</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route(('contact.index'))}}">contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  target="_blank" href="{{route('shopping')}}">show_website</a>
                        </li>

                    </ul>
                </div>
            </nav>
    @endif
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
