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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="area font-sans bg-base text-white text-sm">
    <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
        <a href="#" class="block"><img src="{{ asset('img/logo.svg') }}" width="200px" alt="logo"></a>
        <div class="flex items-center mt-2 md:mt-0">
            @if (Route::has('login'))
                <div class="px-6 py-4">
                    @auth
                        <livewire:comment-notifications /> 
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-maroon underline">Log in</a>
                        <span class="text-xl ml-4 text-maroon">|</span>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-maroon underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            @auth
            <a href="#">
                <img src="{{ auth()->user()->getAvatar() }}" alt="avatar"
                    class="w-10 h-10 rounded-full">
            </a>
            @endauth
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
                    <livewire:create-idea />
                
            </div>

        </div>
        <div class="px-0 w-175">
            <livewire:status-filters />
            
            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>
    </main>

    @livewireScripts

</body>

</html>
@if (session('error_message'))
            <x-success-notification
                type="error"
                :redirect="true"
                messageToDisplay="{{ (session('error_message')) }}"
            />
        @endif