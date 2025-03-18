<x-guest-layout>
    <section class="w-full px-6">
        <header class="w-full text-sm my-6 flex justify-between items-center">
            <h2 class="text-4xl font-bold text-white flex-1">Producten van {{ $user->name }}</h2>
            <a href="{{ route('welcome') }}" class="text-lg text-blue-400 hover:text-blue-300 transition">← Terug naar overzicht</a>
        </header>

        <div class="grid grid-cols-12 gap-6">
            @foreach ($products as $product)
                <div class="col-span-4 bg-black text-white border border-[#3E3E3A] rounded-lg p-6 shadow-lg">
                    <img src="https://picsum.photos/seed/{{ $product->id }}/400/250" alt="Product afbeelding"
                         class="w-full h-[250px] object-cover rounded-lg mb-4">
                    <h3 class="text-2xl font-bold">{{ $product->name }}</h3>
                    <p class="text-lg">€{{ number_format($product->price, 2) }}</p>
                    <a href="{{ route('show', $product->id) }}" 
                       class="inline-block mt-3 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg transition">
                        Bekijk product
                    </a>
                </div>
            @endforeach
        </div>
    </section>
</x-guest-layout>
