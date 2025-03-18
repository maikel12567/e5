<x-guest-layout>
    <section class="flex flex-col items-center justify-center container lg:px-6 sm:px-4">
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

        <section class="w-full grid grid-cols-12 gap-6  mb-20">
            <form method="GET" action="{{ route('welcome') }}" class="col-span-12 grid grid-cols-12 gap-6 w-full mb-6"
                id="filterForm">
                <!-- Search Bar -->
                <div class="mb-4 col-span-12 flex flex-row gap-2">
                    <input type="text" name="search" placeholder="Zoek producten" value="{{ request('search') }}"
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
                <div
                    class="col-span-4 flex flex-col h-full px-5 pt-5 pb-3 border-[#3E3E3A] text-white border rounded-sm text-sm leading-normal transition-all duration-300">
                    <img src="https://picsum.photos/seed/{{ $product->id }}/1300/600" alt="Product afbeelding"
                        class="rounded-sm mb-4">

                    <h1 class="text-2xl font-bold mb-4">{{ $product->name }}</h1>
                    <p><strong>Description:</strong> {{ $product->description }}</p>
                    <p><strong>Sustainability:</strong> {{ $product->sustainability }}</p>
                    <div class="flex flex-row gap-3 my-4">
                        <p class="flex flex-row gap-2"><strong><i class="fa-solid fa-puzzle-piece"></i></strong>
                            {{ $product->complexity }}
                        </p>
                        <p class="flex flex-row gap-2"><strong><i class="fa-solid fa-file"></i></strong>
                            {{ $product->type_name }}
                        </p>
                        <p class="flex flex-row gap-2"><strong><i class="fa-solid fa-gem"></i></strong>
                            {{ $product->material }}
                        </p>
                        <p class="flex flex-row gap-2"><strong><i class="fa-solid fa-clock"></i></strong>
                            {{ $product->production_time }}
                        </p>
                    </div>
                    <div class="flex flex-row justify-between items-center mt-auto">
                        <p class="text-lg font-semibold"><strong>Price:</strong>
                            €{{ number_format($product->price, 2) }}
                        </p>
                        <a href="{{ route('show', $product->id) }}" class="text-blue-500 hover:underline">Bekijken</a>
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
