<x-guest-layout>
    <section class="w-full px-6">
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

        <!-- Product Details -->
        <section class="w-full grid grid-cols-12 gap-6 mb-20">
            <div class="col-span-12 bg-[#222] text-white border border-[#3E3E3A] rounded-lg p-8 shadow-lg">
                <img src="https://picsum.photos/seed/{{ $product->id }}/1920/600" 
                     alt="Product afbeelding" 
                     class="w-full h-[500px] object-cover rounded-lg mb-6">

                <h1 class="text-5xl font-bold mb-6">{{ $product->name }}</h1>
                <p class="text-xl mb-6"><strong>Description:</strong> {{ $product->description }}</p>
                <p class="text-lg mb-6"><strong>Sustainability:</strong> {{ $product->sustainability }}</p>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-lg my-6">
                    <p class="flex items-center gap-2"><i class="fa-solid fa-puzzle-piece"></i> <strong>Complexity:</strong> {{ $product->complexity }}</p>
                    <p class="flex items-center gap-2"><i class="fa-solid fa-file"></i> <strong>Type:</strong> {{ $product->type_name }}</p>
                    <p class="flex items-center gap-2"><i class="fa-solid fa-gem"></i> <strong>Material:</strong> {{ $product->material }}</p>
                    <p class="flex items-center gap-2"><i class="fa-solid fa-clock"></i> <strong>Production Time:</strong> {{ $product->production_time }}</p>
                </div>

                <div class="flex justify-between items-center mt-8">
                    <p class="text-3xl font-bold">€{{ number_format($product->price, 2) }}</p>
                    <a href="{{ route('welcome') }}" 
                       class="text-lg text-blue-400 hover:text-blue-300 transition">← Terug naar overzicht</a>
                </div>
            </div>
        </section>

       
    </section>
</x-guest-layout>
