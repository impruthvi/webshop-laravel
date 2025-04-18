<?php

namespace App\Livewire;

use App\Actions\Webshop\AddProductVariantToCart;
use App\Models\Product as ModelsProduct;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Product extends Component
{
    use InteractsWithBanner;

    public $productId;
    public $variant;
    
    public $rules = [
        'productId' => ['required', 'exists:products,id'],
        'variant' => ['required', 'exists:product_variants,id'],
    ];

    public function mount()
    {
    }

    public function addToCart(AddProductVariantToCart $cart)
    {
        $this->validate();

        $cart->add(
            variantId: $this->variant,
        );

        $this->banner('Product added to cart', 'success', [
            'position' => 'top-right',
            'duration' => 3000,
        ]);
    }

    public function getProductProperty()
    {
        return ModelsProduct::query()->with('variants')->find($this->productId);
    }


    public function render()
    {
        return view('livewire.product');
    }
}
