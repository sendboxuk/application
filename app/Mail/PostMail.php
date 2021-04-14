<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Helpers\EmailHelper;
use Mustache_Engine;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class PostMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email_model;

    public $template_engine;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EmailHelper $email_model)
    {
        $this->email_model = $email_model;
        
        $this->template_engine = new Mustache_Engine;
    }

    public function getHtmlTemplate(): string
    {
        $template = $this->email_model->getTemplate();

        try {
            $html_template = Storage::get('emails-templates/'. $template->filename .'.html');
        } catch (FileNotFoundException $ex) {
            Storage::put('emails-templates/'. $template->filename . '.html', $template->html_template);
            $html_template = Storage::get('emails-templates/'. $template->filename .'.html');
        }
        return $html_template;
    }    

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { 
        $data = $this->email_model->getPlaceholders();
        $email_body = $this->template_engine->render(
            $this->getHtmlTemplate(),
            $data
        );

        return $this
                    ->subject($this->email_model->getSubject())
                    ->html($email_body)
                    ->with($data); 
    }
}