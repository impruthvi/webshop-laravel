<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($this->products as $product)
        <div class="border p-4 rounded-lg">
            <img src="{{ $product->image->path }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded">
            <h2 class="text-xl font-bold mt-2">{{ $product->name }}</h2>
            <p class="text-gray-700">{{ $product->description }}</p>
            <p class="text-lg font-semibold">{{ $product->price }}</p>
            <button wire:click="addToCart({{ $product->id }})" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded">
                Add to Cart
            </button>
        </div>
    @endforeach
</div>
