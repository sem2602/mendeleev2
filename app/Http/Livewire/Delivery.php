<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Delivery extends Component
{

    public int $delivery_method = 1;
    public int $delivery_provider = 1;

    public function render(): object
    {
        return view('livewire.delivery');
    }
}
