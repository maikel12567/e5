<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Product overview
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Producten</h1>

                <div class="overflow-auto">
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">Naam</th>
                                <th class="border border-gray-300 px-4 py-2">Beschrijving</th>
                                <th class="border border-gray-300 px-4 py-2">Type</th>
                                <th class="border border-gray-300 px-4 py-2">Materiaal</th>
                                <th class="border border-gray-300 px-4 py-2">Productietijd</th>
                                <th class="border border-gray-300 px-4 py-2">Complexiteit</th>
                                <th class="border border-gray-300 px-4 py-2">Duurzaamheid</th>
                                <th class="border border-gray-300 px-4 py-2">Unieke eigenschappen</th>
                                <th class="border border-gray-300 px-4 py-2">Prijs</th>
                                <th class="border border-gray-300 px-4 py-2">Afbeelding</th>
                                <th class="border border-gray-300 px-4 py-2">Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="border border-gray-300">
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->description }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->product_type }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->material }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->production_time }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->complexity }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->sustainability }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $product->unique_properties }}</td>
                                    <td class="border border-gray-300 px-4 py-2">€{{ number_format($product->price, 2) }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product afbeelding" class="h-16 w-16 object-cover rounded">
                                        @else
                                            <span class="text-gray-500">Geen afbeelding</span>
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 flex gap-2">
                                        <a href="{{ route('products.show', $product->id) }}" class="text-blue-500 hover:underline">Bekijken</a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="text-yellow-500 hover:underline">Bewerken</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit product wilt verwijderen?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Verwijderen</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nieuw Product</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
