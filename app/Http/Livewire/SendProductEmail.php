<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Helpers\EmailHelper;
use App\Mail\PostMail;
use Illuminate\Support\Facades\Mail;

class SendProductEmail extends Component
{
    public $placeholders;
    public $email;
    public $sku;
    public $transaction_id;
    public $product_id;

    public function mount($product)
    {
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->sku = $product->sku;
        $this->placeholders = array_merge($product->template->placeholders, $product->template->sensitive_placeholders);
    }

    protected $rules = [
        'transaction_id' => 'required|min:3',
        'email' => 'required|email',
    ];

    public function sendEmail()
    {
        $this->validate();

        $placeholder_values = $this->placeholders;
        $product = Product::find($this->product_id);
 
        $keys = array_merge($product->template->placeholders, $product->template->sensitive_placeholders);
        $placeholder_array = [];
        $i = 0;
        foreach($keys as $key)
        {
            $placeholder_array[$key] = $placeholder_values[$i];
            $i++;
        }
        $request = [
            'sku' => $this->sku,
            'transaction_id' => $this->transaction_id,
            'email' => $this->email,
            'placeholders' => $placeholder_array
        ];

        $email = new EmailHelper();
        $email->createContentForProduct($request);
        Mail::to($request['email'])->queue(new PostMail($email));        
        return redirect()->to('/email-audits');  
    }

    public function render()
    {

        return view('livewire.send-product-email');
    }
}
