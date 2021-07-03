<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- alphineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>


    <!-- Styles -->
    <link href="{{ MIX('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-blue-900 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <nav class="flex space-x-4 text-gray-300 text-sm sm:text-base items-center">
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else

                        <a href="{{ route('video.create', Auth::user()->channel) }}" class="no-underline">
                            <i class="large material-icons text-orange-300">video_call</i>
                        </a>
                        <span>{{ Auth::user()->name }}</span>
                        <a href="{{ route('channel.edit', Auth::user()->channel->slug) }}"
                            class="no-underline hover:underline">
                            {{ Auth::user()->channel->name }}
                        </a>

                        <a href="{{ route('logout') }}" class="no-underline hover:underline"
                            onclick="event.preventDefault();
                                                                                                                                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        @yield('content')
    </div>
    @livewireScripts
</body>

</html>
