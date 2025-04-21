<?php

namespace App\Livewire;

use App\Actions\Webshop\CreateStripeCheckoutSession;
use App\Factories\CartFactory;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Cart extends Component
{

    public function checkout(CreateStripeCheckoutSession $checkoutSession)
    {
        return $checkoutSession->createFromCart($this->cart);
    }



    #[Computed]
    public function cart()
    {
        return CartFactory::make()->loadMissing(['items', 'items.product', 'items.variant']);
    }

    #[Computed]
    public function items()
    {
        return CartFactory::make()->items()->with('product')->get();
    }

    public function remove($itemId)
    {
        CartFactory::make()->items()->where('id', $itemId)->delete();
        $this->dispatch('product-removed-from-cart');
    }

    public function incrementQuantity($itemId)
    {
        CartFactory::make()->items()->where('id', $itemId)->increment('quantity', 1);
        $this->dispatch('product-quantity-incremented');
    }

    public function decrementQuantity($itemId)
    {
        $item = CartFactory::make()->items()->where('id', $itemId)->first();
        if ($item->quantity > 1) {
            $item->decrement('quantity', 1);
        } else {
            $this->remove($itemId);
        }
        $this->dispatch('product-quantity-decremented');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
