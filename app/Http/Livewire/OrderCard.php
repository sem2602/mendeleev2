<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OrderCard extends Component
{

    public object $payments;
    public int $payment_id = 1;

    public function render(): object
    {
        return view('livewire.order-card', ['payments' => $this->payments]);
    }
}
