<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        return view('panel.services.index');
    }

    public function create()
    {
        return view('panel.services.create');
    }

    public function edit(Service $service)
    {
        return view('panel.services.edit', \compact('service'));
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

        return view('panel.services.view', \compact('product', 'json'));
    }    

    public function send(Product $product)
    {
        return view('panel.services.send', \compact('product'));
    }
}
