<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Product Bewerken</h1>

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-600 rounded">
                        <strong>Fouten gevonden:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium text-gray-700">Naam:</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="w-full p-2 border rounded" required>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Beschrijving:</label>
                            <textarea name="description" class="w-full p-2 border rounded">{{ $product->description }}</textarea>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Type:</label>
                            <select name="product_type" class="w-full p-2 border rounded" required>
                                <option value="">Selecteer een type</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}"
                                        {{ isset($product) && $product->product_type == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div>
                            <label class="block font-medium text-gray-700">Materiaal:</label>
                            <input type="text" name="material" value="{{ $product->material }}" class="w-full p-2 border rounded" required>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Productietijd:</label>
                            <input type="text" name="production_time" value="{{ $product->production_time }}" class="w-full p-2 border rounded" required>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Complexiteit:</label>
                            <input type="text" name="complexity" value="{{ $product->complexity }}" class="w-full p-2 border rounded" required>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Duurzaamheid:</label>
                            <input type="text" name="sustainability" value="{{ $product->sustainability }}" class="w-full p-2 border rounded" required>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Unieke eigenschappen:</label>
                            <textarea name="unique_properties" class="w-full p-2 border rounded">{{ $product->unique_properties }}</textarea>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Prijs (€):</label>
                            <input type="number" name="price" value="{{ $product->price }}" step="0.01" class="w-full p-2 border rounded" required>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Afbeelding:</label>
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Product afbeelding" class="h-16 w-16 object-cover rounded">
                            @endif
                            <input type="file" name="image" class="w-full p-2 border rounded">
                        </div>
                    </div>

                    <div class="mt-6 flex gap-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Opslaan</button>
                        <a href="{{ route('admin.product') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Annuleren</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
