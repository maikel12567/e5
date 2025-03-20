<x-guest-layout>
<section class="flex flex-col items-center justify-center container lg:px-6 sm:px-4">
<!-- Header -->
        @include('layouts.guestnav')

        <header class="w-full text-sm my-6 flex justify-between items-center">
            <h2 class="text-4xl font-bold text-white flex-1">Producten van {{ $user->name }}</h2>
            <a href="{{ route('welcome') }}" class="text-lg text-blue-400 hover:text-blue-300 transition">← Terug naar overzicht</a>
        </header>

        <!-- Product Grid -->
        <div class="grid grid-cols-12 gap-6">
            @foreach ($products as $product)
                <div class="col-span-4 flex flex-col bg-black border border-gray-700 rounded-lg shadow-lg p-5 transition-all duration-300 hover:shadow-xl">
                    <!-- Product Image -->
                    <div class="relative w-full h-56 rounded-lg overflow-hidden">
                        <img src="https://picsum.photos/seed/{{ $product->id }}/400/250" 
                             alt="Product afbeelding"
                             class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                    </div>

                    <!-- Product Info -->
                    <div class="mt-4 flex flex-col flex-grow">
                        <h3 class="text-xl font-semibold text-white">{{ $product->name }}</h3>
                        <p class="text-lg text-gray-300 mt-1">€{{ number_format($product->price, 2) }}</p>
                    </div>

                    <!-- CTA Button -->
                    <a href="{{ route('show', $product->id) }}" 
                       class="mt-auto px-4 py-2 border border-gray-400 text-white text-sm font-semibold rounded-lg hover:bg-gray-800 transition text-center">
                        Bekijk product
                    </a>
                </div>
            @endforeach
        </div>
    </section>
</x-guest-layout>
