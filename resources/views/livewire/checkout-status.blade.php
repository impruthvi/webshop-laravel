<div class="text-center bg-white p-10 rounded-lg shadow-lg max-w-lg w-full">
    <h2 class="{{ $this->order ? 'text-green-600' : 'text-red-600' }} text-3xl font-bold mb-6">
        {{ $this->order ? 'Order Placed Successfully!' : 'Order Not Placed' }}
    </h2>
    <p class="text-gray-600 text-lg mb-4">
        @if ($this->order)
            Your order has been placed successfully. Your order number is
            <strong class="text-green-600">{{ $this->order->id }}</strong>.
        @else
            Your order has not been placed yet. Please try again.
        @endif
    </p>
    <a href="/"
        class="inline-block mt-6 px-6 py-3 bg-blue-600 text-black rounded-lg text-base font-medium hover:bg-blue-700 transition duration-300">
        Go Back to Home
    </a>
</div>
