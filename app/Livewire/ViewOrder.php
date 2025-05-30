<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class ViewOrder extends Component
{
    public $orderId;

    #[Computed]
    public function order()
    {
        return auth()->user()->orders()->findOrFail($this->orderId);
    }

    public function render()
    {
        return view('livewire.view-order');
    }
}
