<div class="container mx-auto mt-10">
    <div class="flex shadow-md my-10">
        <div class="w-full bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">Shopping Cart</h1>
            </div>
            <div class="flex mt-10 mb-5">
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Name</h3>
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">Action</h3>
            </div>
            @foreach ($this->items as $item)
                <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                    <div class="flex w-2/5">
                        <span class="font-bold text-sm">{{ $item->product->name }}</span>
                    </div>
                    <div class="flex justify-center w-1/5">
                        <button 
                            wire:click="decrementQuantity({{ $item->id }})" 
                            class="text-gray-500 hover:text-gray-700 font-semibold text-sm px-2">
                            -
                        </button>
                        <span class="mx-2 border text-center w-8">{{ $item->quantity }}</span>
                        <button 
                            wire:click="incrementQuantity({{ $item->id }})" 
                            class="text-gray-500 hover:text-gray-700 font-semibold text-sm px-2">
                            +
                        </button>
                    </div>
                    <span class="text-center w-1/5 font-semibold text-sm">
                        {{ $item->product->price }}
                    </span>
                    <div class="flex justify-center w-1/5">
                        <button 
                            wire:click="remove({{ $item->id }})" 
                            class="text-red-500 hover:text-red-700 font-semibold text-sm">
                            Delete
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
