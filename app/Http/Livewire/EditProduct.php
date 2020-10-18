<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Template;

class EditProduct extends Component
{
    public $name;
    public $sku;
    public $template_id;
    public $product_id;

    protected $rules = [
        'name' => 'required|min:6',
        'sku' => 'required|min:3',
        'template_id' => 'required',
        'product_id' => 'required'
    ];
    
    public function mount($product)
    {
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->sku = $product->sku;
        $this->template_id = $product->template_id;
    }

    public function editProduct()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.
        $product = Product::find($this->product_id);
        $product->update(
            [
            'name' => $this->name,
            'sku' => $this->sku,
            'template_id' => $this->template_id
        ]);
        return redirect()->to('/products');
    }

    public function render()
    {
        $templates = Template::all();
        return view('livewire.edit-product', \compact('templates'));
    }
}
