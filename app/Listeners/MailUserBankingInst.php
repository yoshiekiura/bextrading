<?php

namespace Tradesys\Listeners;

use Mail;
use Tradesys\Events\NewUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Tradesys\Mail\InstTransMail;

class MailUserBankingInst
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
     * @param  NewUser  $event
     * @return void
     */
    public function handle(NewUser $event)
    {
        $user = $event->user;
         Mail::to($event->user->email)
                ->send(new InstTransMail($user));
    }
}
