<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Mail;
use App\Mail\PostMail;

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
    
}
