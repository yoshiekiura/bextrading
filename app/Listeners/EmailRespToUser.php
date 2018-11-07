<?php

namespace Tradesys\Listeners;

use Mail;
use Tradesys\Events\ContactAdviser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Tradesys\Mail\UserNotification;

class EmailRespToUser
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
     * @param  ContactAdviser $event
     * @return void
     */
    public function handle(ContactAdviser $event)
    {
        $user   = $event->user;
        Mail::to($event->user->email)
              ->send(new UserNotification($event->user));
    }
}
