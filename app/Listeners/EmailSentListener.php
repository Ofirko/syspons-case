<?php

namespace App\Listeners;
use App\Models\EmailLog;


use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Mail\Events\MessageSent;

class EmailSentListener
{
    // /**
    //  * Create the event listener.
    //  */
    // public function __construct()
    // {
    //     //
    // }

    /**
     * Handle the event.
     */
    public function handle(MessageSent $event)
    {
        $subject        = $event->message->getSubject();
        $toArr          = $this->parseAddresses($event->message->getTo());
        $ccArr          = $this->parseAddresses($event->message->getCc());
        $from           = $event->message->getFrom()[0]->getAddress();
        $body           = $this->parseBodyText($event->message->getTextBody());
        $user           = auth()->id() ?? NULL;


        EmailLog::create([
            'user_id'   => $user,
            'from'      => $from,
            'to'        => json_encode($toArr),
            'cc'        => $ccArr ? json_encode($ccArr) : NULL,
            'subject'   => $subject,
            'body'      => $body,
        ]);

        return false;
    }



    private function parseAddresses(array $array): array
    {
        $parsed = [];
        foreach($array as $address) {
            $parsed[] = $address->getAddress();
        }
        return $parsed;
    }

    private function parseBodyText($body): string
    {
        return preg_replace('~[\r\n]+~', '<br>', $body);
    }
}



