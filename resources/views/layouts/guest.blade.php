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

<body
    class="flex flex-col items-center justify-center container lg:px-6 sm:px-4 bg-black font-sans text-gray-900 antialiased">
    <header class="w-full text-sm my-6">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 border-[#3E3E3A] hover:border-gray-300 text-white border rounded-sm text-sm leading-normal transition-all duration-300 ">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 border-[#3E3E3A] hover:border-gray-300 text-white border rounded-sm text-sm leading-normal transition-all duration-300">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 border-[#3E3E3A] hover:border-gray-300 text-white border rounded-sm text-sm leading-normal transition-all duration-300">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
    {{ $slot }}
</body>

</html>
