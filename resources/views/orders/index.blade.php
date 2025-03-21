<x-guest-layout>
<section class="flex flex-col items-center justify-center container lg:px-6 sm:px-4">

    @include('layouts.guestnav')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-white mb-6">Mijn Orders</h1>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="py-3 px-6">#</th>
                        <th class="py-3 px-6">Product ID</th>
                        <th class="py-3 px-6">Status</th>
                        <th class="py-3 px-6">Aangemaakt op</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr class="border-b hover:bg-gray-100 transition">
                            <td class="py-3 px-6">{{ $order->id }}</td>
                            <td class="py-3 px-6">{{ $order->product_id }}</td>
                            <td class="py-3 px-6">
                                <span class="px-2 py-1 rounded-full text-white text-sm 
                                    {{ $order->order_status == 'completed' ? 'bg-green-500' : 'bg-yellow-500' }}">
                                    {{ ucfirst($order->order_status) }}
                                </span>
                            </td>
                            <td class="py-3 px-6">{{ $order->created_at}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">Geen orders gevonden.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
</x-guest-layout>
