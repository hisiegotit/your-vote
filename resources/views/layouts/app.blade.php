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
    <livewire:styles />
</head>

<body class="area font-sans bg-base text-maroon text-sm">
    <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
        <a href="#" class="block"><img src="{{ asset('img/logo.svg') }}" width="200px" alt="logo"></a>
        <div class="flex items-center mt-2 md:mt-0">
            @if (Route::has('login'))
                <div class="px-6 py-4">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                {{ __('Log out') }}
                            </a>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-maroon underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-maroon underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <a href="#">
                <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" alt="avatar"
                    class="w-10 h-10 rounded-full">
            </a>
        </div>
    </header>
    <main class="container mx-auto max-w-custom flex flex-col md:flex-row">
        <div class="w-70 md:mr-5 mx-auto md:mx-0">
            <div class="bg-surface0 border-2 border-maroon rounded-xl mt-16 md:sticky md:top-8">
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold">Add an idea</h3>
                    @auth
                    <p class="text-xs mt-4">Let us know what you would like and we'll take a look over!</p>
                        @else
                        <p class="text-lg mt-4">Login and create an idea.</p>
                        @endauth
                </div>
                @auth
                    <livewire:create-idea />
                @else
                <div class="my-6 text-center">
                    <a href="{{ Route('login') }}" class="inline-block justify-center w-1/2 h-11 text-xs text-base bg-maroon font-semibold rounded-xl border border-maroon hover:border-overlay0 transition duration-150 ease-in px-6 py-3">
                    <span class="ml-1">Login</span>
                    </a>
                    <a href="{{ Route('register') }}" class="inline-block justify-center w-1/2 h-11 text-xs bg-overlay0 font-semibold rounded-xl border border-overlay0 hover:border-maroon transition duration-150 ease-in px-6 py-3 mt-4">
                    <span class="ml-1">Sign Up</span>
                    </a>
                </div>
                @endauth
            </div>

        </div>
        <div class="px-0 w-175">
            <nav class="flex items-center justify-between text-xs">
                <ul class="flex uppercase font-semibold space-x-10 border-b-3 pb-3">
                    <li><a href="" class="border-b-4 pb-3 border-maroon">All Ideas (26)</a></li>
                    <li><a href=""
                            class="text-subtext0 transititon duration-150 ease-in border-b-4 pb-3 border-base hover:border-maroon hover:border-b-5">Considering
                            (6)</a></li>
                    <li><a href=""
                            class="text-subtext0 transititon duration-150 ease-in border-b-4 pb-3 border-base hover:border-maroon">In
                            progess (6)</a></li>
                </ul>
                <ul class="flex uppercase font-semibold space-x-10 border-b-3 pb-3">
                    <li><a href=""
                            class="text-subtext0 transititon duration-150 ease-in border-b-4 pb-3 border-base hover:border-maroon hover:border-b-5">Implemented
                            (2)</a></li>
                    <li><a href=""
                            class="text-subtext0 transititon duration-150 ease-in border-b-4 pb-3 border-base hover:border-maroon hover:border-b-5">Closed
                            (5)</a></li>
                </ul>
            </nav>
            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>
    </main>
    <livewire:scripts />

</body>

</html>
