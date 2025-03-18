<header class="w-full text-sm my-6 flex justify-between items-center">
    <h2 class="text-4xl font-bold text-white flex-1">Makersmarkt</h2>

    @if (Route::has('login'))
    <nav class="flex items-center gap-4">
        @auth
        <a href="{{ url('/dashboard') }}"
            class="inline-block px-5 py-1.5 border-[#3E3E3A] hover:border-gray-300 text-white border rounded-sm text-sm leading-normal transition-all duration-300">
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