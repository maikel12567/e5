<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Product Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">{{ $product->name }}</h1>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p><strong>Beschrijving:</strong> {{ $product->description }}</p>
                        <p><strong>Type:</strong> {{ $product->product_type }}</p>
                        <p><strong>Materiaal:</strong> {{ $product->material }}</p>
                        <p><strong>Productietijd:</strong> {{ $product->production_time }}</p>
                        <p><strong>Complexiteit:</strong> {{ $product->complexity }}</p>
                        <p><strong>Duurzaamheid:</strong> {{ $product->sustainability }}</p>
                        <p><strong>Unieke eigenschappen:</strong> {{ $product->unique_properties }}</p>
                        <p class="text-lg font-semibold"><strong>Prijs:</strong> €{{ number_format($product->price, 2) }}</p>
                    </div>

                    <div>
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-auto rounded-lg shadow">
                        @else
                            <p class="text-gray-500">Geen afbeelding beschikbaar</p>
                        @endif
                    </div>
                </div>

                <div class="mt-6 flex gap-4">
                    <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Terug naar overzicht</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Bewerken</a>

                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit product wilt verwijderen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Verwijderen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
