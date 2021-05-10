<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Service;
use App\Helpers\EmailHelper;
use App\Mail\PostMail;
use Illuminate\Support\Facades\Mail;

class SendServiceEmail extends Component
{
    public $placeholders;

    public $transaction_id;
    public $service_id;
    
    public function mount($service)
    {
        $this->service_id = $service->id;
        $this->placeholders = array_merge($service->template->placeholders, $service->template->sensitive_placeholders);
    }    

    protected $rules = [
        'transaction_id' => 'required|min:3'
    ];    


    public function sendEmail()
    {
        $this->validate();

        $placeholder_values = $this->placeholders;
        $service = Service::find($this->service_id);
        $keys = array_merge($service->template->placeholders, $service->template->sensitive_placeholders);

        $placeholder_array = [];
        $i = 0;
        foreach($keys as $key)
        {
            $placeholder_array[$key] = $placeholder_values[$i];
            $i++;
        }
        $request = [
            'transaction_id' => $this->transaction_id,
            'service' => $this->service_id,
            'placeholders' => $placeholder_array
        ];
        
        $to_emails = [];
        foreach(explode(',', $service->emails) as $email){
            $to_emails[] = trim($email);
        }

        $emailHelper = new EmailHelper();
        $emailHelper->createContentForService($request);
        Mail::to($to_emails)->queue(new PostMail($emailHelper));
        return redirect()->to('/email-audits');  
    }    

    public function render()
    {
        return view('livewire.send-service-email');
    }
}
