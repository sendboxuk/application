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
        DB::table('email_audits')->insert(
            [
                'message' => $event->message->getBody(),
                'to' => json_encode($event->message->getTo()),
                'subject'=> $event->message->getSubject(),
                'transaction_id' => $event->data['transaction_id'],
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ]
        );
    }
}
