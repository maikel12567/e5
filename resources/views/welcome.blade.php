<x-guest-layout>
    <section class="flex flex-col items-center justify-center container lg:px-6 sm:px-4">
    @include('layouts.guestnav')
    @if (session('success') || session('error'))
    <div id="alertMessage" class="w-full max-w-2xl mx-auto text-white text-center p-4 rounded-lg shadow-lg transition-opacity duration-500 ease-in-out opacity-100 
        {{ session('success') ? 'bg-green-500' : 'bg-red-500' }}">
        {{ session('success') ?? session('error') }}
    </div>

    <script>
        setTimeout(() => {
            let message = document.getElementById('alertMessage');
            if (message) {
                message.classList.add('opacity-0'); // Laat het vervagen
                setTimeout(() => message.style.display = 'none', 500); // Verwijder na fade-out
            }
        }, 3000);
    </script>
@endif



        <section class="w-full grid grid-cols-12 gap-6  mb-20">
            <form method="GET" action="{{ route('welcome') }}" class="col-span-12 grid grid-cols-12 gap-6 w-full mb-6"
                id="filterForm">
                <!-- Search Bar -->
                <div class="mb-4 col-span-12 flex flex-row gap-2">
                    <input type="text" name="search" placeholder="Search products" value="{{ request('search') }}"
                        class="w-full  bg-transparent inline-block px-5 py-1.5 border-[#3E3E3A] hover:border-gray-300 text-white border rounded-sm transition-all duration-300">
                    <button type="submit"
                        class="flex flex-row gap-3 items-center px-5 py-1.5 border-[#3E3E3A] hover:border-gray-300 text-white border rounded-sm text-sm leading-normal transition-all duration-300 "><i
                            class="fa-solid fa-magnifying-glass"></i>Search</button>
                </div>

                <!-- Filter by Product Type -->
                <div class="mb-4 col-span-3">
                    <label for="product_type" class="block text-white mb-2">Types</label>
                    <select name="product_type"
                        class="w-full  bg-black inline-block px-5 py-1.5 border-[#3E3E3A] hover:border-gray-300 text-white border rounded-sm transition-all duration-300">
                        <option value="">All types</option>
                        @foreach ($productTypes as $type)
                        <option value="{{ $type->id }}"
                            {{ request('product_type') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Filter by Complexity -->
                <div class="mb-4 col-span-3">
                    <label for="complexity" class="block text-white mb-2">complexities</label>
                    <select name="complexity"
                        class="w-full  bg-black inline-block px-5 py-1.5 border-[#3E3E3A] hover:border-gray-300 text-white border rounded-sm transition-all duration-300">
                        <option value="">All complexities</option>
                        @foreach ($complexityOptions as $complexity)
                        <option value="{{ $complexity }}"
                            {{ request('complexity') == $complexity ? 'selected' : '' }}>
                            {{ $complexity }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Filter by Sustainability -->
                <div class="mb-4 col-span-3">
                    <label for="sustainability" class="block text-white mb-2">Sustainability</label>
                    <select name="sustainability"
                        class="w-full  bg-black inline-block px-5 py-1.5 border-[#3E3E3A] hover:border-gray-300 text-white border rounded-sm transition-all duration-300">
                        <option value="">All sustainability Options</option>
                        @foreach ($sustainabilityOptions as $sustainability)
                        <option value="{{ $sustainability }}"
                            {{ request('sustainability') == $sustainability ? 'selected' : '' }}>
                            {{ $sustainability }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Order by Price -->
                <div class="mb-4 col-span-3">
                    <label for="price" class="block text-white mb-2">Price</label>
                    <select name="price"
                        class="w-full  bg-black inline-block px-5 py-1.5 border-[#3E3E3A] hover:border-gray-300 text-white border rounded-sm transition-all duration-300">
                        <option value="">All prices</option>
                        <option value="high" {{ request('price') == 'high' ? 'selected' : '' }}>High to low</option>
                        <option value="low" {{ request('price') == 'low' ? 'selected' : '' }}>Low to high</option>
                    </select>
                </div>
            </form>

            <!-- Display filtered products -->
            @foreach ($products as $product)
            <div class="col-span-4 flex flex-col h-full p-4 bg-black border border-gray-700 rounded-lg shadow-lg transition-all duration-300 hover:shadow-xl">
                <!-- Product Image -->
                <div class="relative w-full h-56 rounded-lg overflow-hidden">
                    <img src="https://picsum.photos/seed/{{ $product->id }}/1300/600"
                        alt="Product afbeelding"
                        class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                </div>

                <!-- Product Info -->
                <div class="mt-4 flex flex-col flex-grow">
                    <h1 class="text-xl font-semibold text-white">{{ $product->name }}</h1>
                    <p class="text-gray-400 text-sm mt-1">{{ $product->description }}</p>

                    <div class="mt-3 grid grid-cols-2 gap-4 text-gray-300 text-sm">
                        <p class="flex items-center"><i class="fa-solid fa-puzzle-piece mr-2"></i>{{ $product->complexity }}</p>
                        <p class="flex items-center"><i class="fa-solid fa-file mr-2"></i>{{ $product->type_name }}</p>
                        <p class="flex items-center"><i class="fa-solid fa-gem mr-2"></i>{{ $product->material }}</p>
                        <p class="flex items-center"><i class="fa-solid fa-clock mr-2"></i>{{ $product->production_time }}</p>
                    </div>
                </div>

                <!-- Price & Button -->
                <div class="mt-auto flex items-center justify-between">
                    <p class="text-lg font-bold text-white">€{{ number_format($product->price, 2) }}</p>
                    <a href="{{ route('show', $product->id) }}"
                        class="px-4 py-2 border border-gray-400 text-white text-sm font-semibold rounded-lg hover:bg-gray-800 transition">
                        See more
                    </a>
                </div>
            </div>
            @endforeach
        </section>
    </section>


    <script>
        document.getElementById('filterForm').addEventListener('change', function() {
            this.submit();
        });
    </script>
</x-guest-layout>