<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
    @foreach ($this->products as $product)
        <div class="border p-4 rounded-lg">
            <a href="{{ route('product.show', $product->id) }}" class="block mb-2">
                <img src="{{ $product->image->path }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded">
            </a>
            <h2 class="text-xl font-bold mt-2">{{ $product->name }}</h2>
            <p class="text-gray-700 line-clamp-3">
                {{ $product->description }}
            </p>
            <p class="text-lg font-semibold mt-3">{{ $product->price }}</p>
        </div>
    @endforeach
</div>