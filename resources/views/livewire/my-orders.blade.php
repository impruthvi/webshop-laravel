<div class="p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold mb-4">My Orders</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-600">Order ID</th>
                    <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-600">Total</th>
                    <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-600">Order At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($this->orders as $order)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b text-sm text-gray-700">
                            <a href="{{ route('order.show', $order->id) }}" class="text-blue-500 hover:underline">{{ $order->id }}</a>
                        </td>
                        <td class="px-4 py-2 border-b text-sm text-gray-700">{{ $order->amount_total }}</td>
                        <td class="px-4 py-2 border-b text-sm text-gray-700">{{ $order->created_at->diffForHumans() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-2 border-b text-center text-sm text-gray-500">No orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
