<x-guest-layout>
    <section class="container mx-auto px-6 lg:px-20 py-10 bg-black text-white">
        <!-- Breadcrumb -->
        <nav class="text-gray-400 text-sm mb-4">
            <a href="{{ route('welcome') }}" class="hover:text-white transition">Home</a> /
            <span class="text-white">{{ $product->name }}</span>
        </nav>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Image -->
            <div class="relative">
                <img src="https://picsum.photos/seed/{{ $product->id }}/800/800" 
                    alt="Product afbeelding" 
                    class="w-full h-auto object-cover rounded-lg shadow-md border border-gray-700">
            </div>

            <!-- Product Info -->
            <div class="flex flex-col">
                <h1 class="text-4xl font-extrabold text-white mb-4">{{ $product->name }}</h1>
                <p class="text-lg text-gray-300 mb-6">{{ $product->description }}</p>

                <!-- Maker info + "Zie meer" button -->
                <div class="flex items-center space-x-4 mb-6">
                    <span class="text-gray-400 text-sm">Gemaakt door:</span>
                    <span class="text-lg font-semibold text-white">{{ $maker->name }}</span>
                    
                    <a href="{{ route('showmore', $maker->id) }}"
                        class="px-4 py-2 border border-white text-white text-sm font-semibold rounded-lg hover:bg-white hover:text-black transition">
                        Zie meer van deze gebruiker
                    </a>
                </div>

                <!-- Product Details -->
                <div class="grid grid-cols-2 gap-6 border-t border-gray-700 pt-6">
                    <p class="text-gray-300"><strong>Complexity:</strong> {{ $product->complexity }}</p>
                    <p class="text-gray-300"><strong>Type:</strong> {{ $type_name }}</p>
                    <p class="text-gray-300"><strong>Material:</strong> {{ $product->material }}</p>
                    <p class="text-gray-300"><strong>Production Time:</strong> {{ $product->production_time }}</p>
                </div>

                <!-- Price & CTA Buttons -->
                <div class="mt-8 flex flex-col space-y-4">
                    <span class="text-3xl font-bold text-white">€{{ number_format($product->price, 2) }}</span>

                    <!-- Buy Now Button -->
                    <a href="#" 
                        class="w-full px-6 py-3 border border-white text-white text-lg font-semibold rounded-lg text-center">
                        Buy Now
                    </a>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="mt-16">
            <h2 class="text-3xl font-bold text-white mb-6">Reviews</h2>
            
            @if ($reviews->isEmpty())
                <p class="text-gray-400">Nog geen reviews voor dit product.</p>
            @else
                <div class="space-y-6">
                    @foreach ($reviews as $review)
                        <div class="border-b border-gray-700 pb-4">
                            <h3 class="text-xl font-semibold text-white">{{ $review->title }}</h3>
                            <div class="text-yellow-400 text-lg mb-2">
                                @for ($i = 0; $i < $review->score; $i++)
                                    <i class="fa-solid fa-star"></i>
                                @endfor
                            </div>
                            <p class="text-gray-300">{{ $review->description }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-guest-layout>
