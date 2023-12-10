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

<body class="font-sans bg-base text-maroon text-sm">
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
                    <p class="text-xs mt-4">Let us know what you would like and we'll take a look over!</p>
                </div>
                <form action="#" method="POST" class="space-y-4 px-4 py-6">
                    <div>
                        <input type="text"
                            class="w-full bg-overlay0 border-none text-sm text-maroon rounded-xl placeholder-maroon px-4 py-2 focus:outline-none focus:ring focus:ring-maroon"
                            placeholder="Your idea">
                    </div>
                    <div>
                        <select name="add_category" id="add_category"
                            class="w-full bg-overlay0 border-none text-sm text-maroon rounded-xl focus:outline-none focus:ring focus:ring-maroon placeholder-maroon px-4 py-2">
                            <option value="cate1">Category</option>
                            <option value="cate2">Category 2</option>
                            <option value="cate3">Category 3</option>
                            <option value="cate4">Category 4</option>
                        </select>
                    </div>
                    <div>
                        <textarea name="idea" id="idea" cols="30" rows="10"
                            class="border-none w-full bg-overlay0 rounded-xl placeholder-maroon text-sm text-maroon px-4 py-2 focus:outline-none focus:ring focus:ring-maroon"
                            placeholder="Describe your idea"></textarea>
                    </div>
                    <div class="flex items-center justify-between space-x-3">
                        <button type="button"
                            class="flex items-center justify-center w-1/2 h-11 text-xs bg-overlay0 font-semibold rounded-xl border border-overlay0 hover:border-maroon transition duration-150 ease-in px-6 py-3">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-5 text-maroon">
                                <path fill-rule="evenodd"
                                    d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-1"> Attach</span>
                        </button>
                        <button type="submit"
                            class="flex items-center justify-center w-1/2 h-11 text-xs text-base bg-maroon font-semibold rounded-xl border border-maroon hover:border-overlay0 transition duration-150 ease-in px-6 py-3">
                            <path
                                d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                            </svg>
                            <span class="ml-1"> Submit</span>
                        </button>
                    </div>
                </form>
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
