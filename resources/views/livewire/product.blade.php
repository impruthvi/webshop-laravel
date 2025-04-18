<div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-10 mt-6 md:mt-12 my-4 mb-12">
    <!-- Main Image Section -->
    <div class="space-y-4" x-data="{ image: '/{{ $this->product->image->path }}' }">
        <!-- Main Product Image -->
        <div class="col-y-4">
            <div class="bg-white p-5 rounded-lg shadow">
                <img x-bind:src="image" alt="{{ $this->product->name }}" class="w-full h-auto">
            </div>
        </div>

        <!-- Thumbnail Images -->
        <div class="grid grid-cols-3 sm:grid-cols-4 gap-2 sm:gap-4">
            @foreach ($this->product->images as $image)
                <div class="rounded bg-white p-2 shadow">
                    <img src="/{{ $image->path }}" alt="{{ $this->product->name }}" class="w-full h-auto" @click="image = '/{{ $image->path }}'">
                </div>
            @endforeach
        </div>
    </div>

    <!-- Product Details Section -->
    <div>
        <!-- Product Name -->
        <h1 class="text-2xl sm:text-3xl font-medium">
            {{ $this->product->name }}
        </h1>

        <!-- Product Price -->
        <div class="text-lg sm:text-xl text-gray-700 mt-2">
            {{ $this->product->price }}
        </div>

        <!-- Product Description -->
        <div class="mt-4 text-gray-600 text-sm sm:text-base">
            {{ $this->product->description }}
        </div>

        <!-- Variant Selector and Add to Cart -->
        <div class="mt-6 space-y-4">
            <!-- Variant Selector -->
            <select class="block w-full rounded-md border-gray-300 py-2 pr-10 text-gray-900 ring-1 ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm">
                <option value="">Select a variant</option>
                @foreach ($this->product->variants as $variant)
                    <option value="{{ $variant->id }}">{{ $variant->size }} / {{ $variant->color }}</option>
                @endforeach
            </select>

            <!-- Add to Cart Button -->
            <x-button class="w-full">Add to Cart</x-button>
        </div>
    </div>
</div>
