<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Template;
use App\Helpers\EmailHelper;
use App\Mail\PostMail;
use Illuminate\Support\Facades\Mail;

class SendTemplateEmail extends Component
{
    public $placeholders;
    public $email;
    public $template_id;
    public $transaction_id;
 
    public function mount($template)
    {
        $this->template_id = $template->id;
        $this->placeholders = $template->placeholders;
    }

    protected $rules = [
        'transaction_id' => 'required|min:3',
        'email' => 'required|email',
    ];

    public function sendEmail()
    {
        $this->validate();

        $placeholder_values = $this->placeholders;
        $template = Template::find($this->template_id);
        $keys = $template->placeholders;

        $placeholder_array = [];
        $i = 0;
        foreach($keys as $key)
        {
            $placeholder_array[$key] = $placeholder_values[$i];
            $i++;
        }
        $request = [
            'template' => $this->template_id,
            'transaction_id' => $this->transaction_id,
            'email' => $this->email,
            'placeholders' => $placeholder_array
        ];
 
        $email = new EmailHelper();
        $email->createContentForTemplate($request);
        Mail::to($request['email'])->queue(new PostMail($email));        
        return redirect()->to('/email-audits');  
    }

    public function render()
    {

        return view('livewire.send-template-email');
    }
}
