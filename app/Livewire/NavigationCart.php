<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class NavigationCart extends Component
{

    #[Computed]
    #[On(['product-added-to-cart', 'product-removed-from-cart', 'product-quantity-incremented', 'product-quantity-decremented'])]
    public function count()
    {
        return CartFactory::make()->items()->sum('quantity');
    }

    public function render()
    {
        return view('livewire.navigation-cart');
    }
}
