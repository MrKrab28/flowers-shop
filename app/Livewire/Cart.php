<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Cart extends Component
{
    public $cart;

    #[On('qty-updated')]
    public function refresh()
    {
        $this->dispatch('$refresh');
    }

    public function mount($cart)
    {
        $this->cart = $cart;
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
