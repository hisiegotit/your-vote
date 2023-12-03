<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gray-100 text-gray-900 text-sm">
    <header class="flex items-center justify-between px-8 py-4">
        <a href="#"><img src="{{ asset('img/logo.svg') }}" width="200px" alt="logo"></a>
        <div class="flex items-center">
            @if (Route::has('login'))
            <div class="px-6 py-4">
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                        {{ __('Log out') }}
                    </a>
                </form>
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
                @endauth
            </div>
            @endif
            <a href="#">
                <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" alt="avatar" class="w-10 h-10 rounded-full">
            </a>
        </div>
    </header>
    <main class="container mx-auto max-w-1000px flex">
        <div class="w-70 mr-5">
            <div class="bg-white border-2 border-pink rounded-xl mt-16">
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold">Add an idea</h3>
                    <p class="text-xs mt-4">Let us know what you would like and we'll take a look over!</p>
                </div>
                <form action="#" method="POST" class="space-y-4 px-4 py-6">
                    <div>
                        <input type="text" class="w-full bg-gray-100 border-none text-sm rounded-xl placeholder-gray-900 px-4 py-2" placeholder="Your idea">
                    </div>
                </form>
            </div>
        </div>
        <div class="w-175">
            <nav class="flex items-center justify-between text-xs">
                <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
                    <li><a href="" class="border-b-4 pb-3 border-pink">All Ideas (26)</a></li>
                    <li><a href="" class="text-gray-400 transititon duration-150 ease-in border-b-4 pb-3 hover:border-pink">Considering (6)</a></li>
                    <li><a href="" class="text-gray-400 transititon duration-150 ease-in border-b-4 pb-3 hover:border-pink">In progess (6)</a></li>
                </ul>
                <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
                    <li><a href="" class="text-gray-400 transititon duration-150 ease-in border-b-4 pb-3 hover:border-pink">Implemented (2)</a></li>
                    <li><a href="" class="text-gray-400 transititon duration-150 ease-in border-b-4 pb-3 hover:border-pink">Closed (5)</a></li>
                </ul>
            </nav>
            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>
    </main>
</body>

</html>