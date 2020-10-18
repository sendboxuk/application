<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Template;

class CreateProduct extends Component
{
    public $name;
    public $sku;
    public $template_id;

    protected $rules = [
        'name' => 'required|min:6',
        'sku' => 'required|min:3',
        'template_id' => 'required'
    ];

    public function createProduct()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.

        Product::create([
            'name' => $this->name,
            'sku' => $this->sku,
            'template_id' => $this->template_id
        ]);
        return redirect()->to('/products');
    }

    public function render()
    {
        $templates = Template::all();
        return view('livewire.create-product', \compact('templates'));
    }
}
