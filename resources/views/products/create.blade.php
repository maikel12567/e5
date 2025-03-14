<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuw Product Toevoegen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Nieuw Product</h1>

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

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium text-gray-700">Naam:</label>
                            <input type="text" name="name" class="w-full p-2 border rounded" required>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Beschrijving:</label>
                            <textarea name="description" class="w-full p-2 border rounded"></textarea>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Type:</label>
                            <input type="number" name="product_type" class="w-full p-2 border rounded" required>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Materiaal:</label>
                            <input type="text" name="material" class="w-full p-2 border rounded" required>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Productietijd:</label>
                            <input type="text" name="production_time" class="w-full p-2 border rounded" required>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Complexiteit:</label>
                            <input type="text" name="complexity" class="w-full p-2 border rounded" required>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Duurzaamheid:</label>
                            <input type="text" name="sustainability" class="w-full p-2 border rounded" required>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Unieke eigenschappen:</label>
                            <textarea name="unique_properties" class="w-full p-2 border rounded"></textarea>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Prijs (€):</label>
                            <input type="number" name="price" step="0.01" class="w-full p-2 border rounded" required>
                        </div>

                        <div>
                            <label class="block font-medium text-gray-700">Afbeelding:</label>
                            <input type="file" name="image" class="w-full p-2 border rounded">
                        </div>
                    </div>

                    <div class="mt-6 flex gap-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Toevoegen</button>
                        <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Annuleren</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
