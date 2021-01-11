<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Helpers\EmailHelper;

class PostMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email_model;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EmailHelper $email_model)
    {
        $this->email_model = $email_model;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this
                    ->subject($this->email_model->getSubject())
                    ->view('emails.'.$this->email_model->getTemplate()->filename)
                    ->with($this->email_model->getPlaceholders()); 
    }
}