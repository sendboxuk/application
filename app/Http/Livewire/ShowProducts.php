<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Product;

class ShowProducts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.show-products', [
            'products' => Product::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
