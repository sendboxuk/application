<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Mail\Events\MessageSent;
use DB;
use Log;

class LogSentMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        $to = array_keys($event->message->getTo());

        $emailModel = $event->data['email_model'];
        $template = $emailModel->getTemplate();
        
        $sensitive_placeholders = $template->sensitive_placeholders;
        $placeholders = $emailModel->getPlaceholders();
        $message = $event->message->getBody();

        foreach($placeholders as $key => $value){
            if (in_array($key, $sensitive_placeholders)){
                $fill = str_repeat('*', strlen ($value)); 
                $message = str_replace($value, $fill, $message);
            }
        }

        DB::table('email_audits')->insert(
            [
                'message' => $message,
                'to' => $to[0],
                'subject'=> $event->message->getSubject(),
                'transaction_id' => $event->data['transaction_id'],
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ]
        );
    }
}
