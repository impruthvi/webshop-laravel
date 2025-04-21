<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class MyOrders extends Component
{

    #[Computed]
    public function orders()
    {
        return auth()->user()->orders()
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.my-orders');
    }
}
