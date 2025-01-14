<?php

namespace App\Livewire;

use App\Models\CartItem as Model;
use Livewire\Attributes\On;
use Livewire\Component;

class CartItem extends Component
{
    public $item;

    #[On('qty-updated')]
    public function refresh()
    {
        $this->dispatch('$refresh');
    }

    public function mount($item)
    {
        $this->item = $item;
    }

    public function render()
    {
        return view('livewire.cart-item');
    }

    public function increment()
    {

        $item = Model::where('cart_id', $this->item->cart_id)->where('kode_product', $this->item->kode_product)->first();
        // if($item->cart->total >= 10000000) dd($item->cart->total) ;
        if($item->cart->items->sum('total') < 1000000) {

            if ($item->qty < $item->product->stok && $item->qty < 10) {
                $item->qty = $item->qty + 1;
                $item->update();
            }
        }



        $this->dispatch('qty-updated');
    }

    public function decrement()
    {
        $item = Model::where('cart_id', $this->item->cart_id)->where('kode_product', $this->item->kode_product)->first();
        if ($item->qty == 1) {
            $item->delete();

            redirect()->route('cart');
        } else {
            $item->qty = $item->qty - 1;
            $item->update();
        }

        $this->dispatch('qty-updated');
    }
}
