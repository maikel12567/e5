<x-guest-layout>
    <section class="w-full grid grid-cols-12 gap-6">
        <form method="GET" action="{{ route('welcome') }}" class="col-span-12 grid grid-cols-12 gap-6 w-full mb-6"
            id="filterForm">
            <!-- Search Bar -->
            <div class="mb-4 col-span-12 flex flex-row gap-2">
                <input type="text" name="search" placeholder="Zoek producten" value="{{ request('search') }}"
                    class="w-full  bg-transparent inline-block px-5 py-1.5 border-[#3E3E3A] hover:border-gray-300 text-white border rounded-sm transition-all duration-300">
                <button type="submit"
                    class="inline-block px-5 py-1.5 border-[#3E3E3A] hover:border-gray-300 text-white border rounded-sm text-sm leading-normal transition-all duration-300 ">Filter</button>
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
                class="col-span-4 inline-block px-5 py-1.5 border-[#3E3E3A] text-white border rounded-sm text-sm leading-normal transition-all duration-300">
                <div>
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="w-full h-auto rounded-lg shadow">
                    @else
                        <p class="text-gray-500">No images available</p>
                    @endif
                </div>

                <h1 class="text-2xl font-bold mb-4">{{ $product->name }}</h1>
                <p><strong>Description:</strong> {{ $product->description }}</p>
                <p><strong>Type:</strong> {{ $product->type_name }}</p>
                <p><strong>Material:</strong> {{ $product->material }}</p>
                <p><strong>Production time:</strong> {{ $product->production_time }}</p>
                <p><strong>Complexity:</strong> {{ $product->complexity }}</p>
                <p><strong>Sustainability:</strong> {{ $product->sustainability }}</p>
                <p><strong>Unique properties:</strong> {{ $product->unique_properties }}</p>
                <p class="text-lg font-semibold"><strong>Price:</strong> €{{ number_format($product->price, 2) }}</p>
            </div>
        @endforeach
    </section>


    <script>
        // When any input in the filter form changes, submit the form.
        document.getElementById('filterForm').addEventListener('change', function() {
            this.submit();
        });
    </script>
</x-guest-layout>
