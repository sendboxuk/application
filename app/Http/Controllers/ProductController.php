<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('panel.products.index');
    }

    public function create()
    {
        return view('panel.products.create');
    }

    public function edit(Product $product)
    {
        return view('panel.products.edit', \compact('product'));
    }    
 
    public function view(Product $product)
    {
        $template = $product->template;
        $json = [
            'sku' => $product->sku,
            'transaction_id' => 'YOUR TRANSACTION ID',
            'email' => 'WHO WILL RECEIVE',
            'placeholders' => $template->sample_placeholders
        ];

        return view('panel.products.view', \compact('product', 'json'));
    }    

    public function send(Product $product)
    {
        return view('panel.products.send', \compact('product'));
    }
}
