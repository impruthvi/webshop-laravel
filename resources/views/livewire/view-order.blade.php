<div class="grid grid-cols-2 gap-4">
    <x-panel class="mt-12 col-span-2" title="Your Order #{{ $this->order->id }}">
        <div class="w-full bg-white px-10 py-10">

            <div class="flex mb-5">
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Name</h3>
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">Subtotal</h3>
            </div>

            @foreach ($this->order->items as $item)
                <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                    <div class="flex w-2/5">
                        <span class="font-bold text-sm">{{ $item->name }}</span>
                        <span class="text-gray-500 text-xs ml-2">{{ $item->description }}</span>
                    </div>
                    <span class="text-center w-1/5 font-semibold text-sm">{{ $item->quantity }}</span>
                    <span class="text-center w-1/5 font-semibold text-sm">{{ $item->amount_subtotal }}</span>
                </div>
            @endforeach

            <div class="flex justify-end mt-10">
                <div class="w-1/3">
                    <div class="flex justify-between border-t pt-4">
                        <span class="font-semibold text-lg">Grand Total:</span>
                        <span class="font-semibold text-lg">{{ $this->order->amount_total }}</span>
                    </div>

                    @if ($this->order->amount_shipping->isPositive())
                        <div class="flex justify-between">
                            <span>Shipping Cost:</span>
                            <span>{{ $this->order->amount_shipping }}</span>
                        </div>
                    @endif

                    @if ($this->order->amount_discount->isPositive())
                        <div class="flex justify-between">
                            <span>Discount:</span>
                            <span>{{ $this->order->amount_discount }}</span>
                        </div>
                    @endif

                    @if ($this->order->amount_tax->isPositive())
                        <div class="flex justify-between">
                            <span>Tax:</span>
                            <span>{{ $this->order->amount_tax }}</span>
                        </div>
                    @endif

                    @if ($this->order->amount_subtotal->isPositive())
                        <div class="flex justify-between">
                            <span>Sub Total:</span>
                            <span>{{ $this->order->amount_subtotal }}</span>
                        </div>
                    @endif

                    @if ($this->order->amount_total->isPositive())
                        <div class="flex justify-between">
                            <span>Total:</span>
                            <span>{{ $this->order->amount_total }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </x-panel>

    <!-- Billing and Shipping Side by Side -->
    <!-- Billing and Shipping Side by Side with Responsive Support -->
    <div class="col-span-2">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-panel title="Billing Information">
                @foreach ($this->order->billing_address->filter() as $value)
                    {{ $value }} <br>
                @endforeach
            </x-panel>

            <x-panel title="Shipping Information">
                @foreach ($this->order->shipping_address->filter() as $value)
                    {{ $value }} <br>
                @endforeach
            </x-panel>
        </div>
    </div>
</div>
