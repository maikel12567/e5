<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-12 bg-black border-[#3E3E3A] text-white border rounded-sm text-sm leading-normal">
                <h1 class="text-2xl font-bold mb-4">Products</h1>

                <div class="my-4">
                    <a href="{{ route('admin.product.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nieuw
                        Product</a>
                </div>

                <div class="overflow-auto">
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-[#3E3E3A] text-white text-left">
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">Naam</th>
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
                                    <td class="border border-gray-300 px-4 py-2">
                                        €{{ number_format($product->price, 2) }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        @if ($product->image)
                                            <img src="https://picsum.photos/seed/{{ $product->id }}/300/300"
                                                alt="Product afbeelding" class="h-16 w-16 object-cover rounded">
                                        @else
                                            <span class="text-gray-500">Geen afbeelding</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('admin.product.edit', $product->id) }}"
                                            class="text-yellow-500 hover:underline">Bewerken</a>
                                        <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST"
                                            onsubmit="return confirm('Weet je zeker dat je dit product wilt verwijderen?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:underline">Verwijderen</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
