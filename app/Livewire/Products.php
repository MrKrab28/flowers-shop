<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $searchKeyword;

    public function render()
    {
        $data = [
            'products' => Product::where('nama', 'like', '%' . $this->searchKeyword . '%')->orWhere('deskripsi', 'like', '%' . $this->searchKeyword . '%')->orderBy('nama')->paginate(12)
        ];

        return view('livewire.products', $data);
    }
}
