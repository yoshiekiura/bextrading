<?php

namespace Tradesys\Listeners;

use Mail;
use Tradesys\Events\ContactAdviser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailQueryToAdmin
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
        $user = $event->user;

        $fields = [
              'mensaje' => request('mensaje'),
//              'email'   => Auth::user()->email,
              'email'   => $event->user->email,
              'name'    => $event->user->name,
              'phone'   => $event->user->phone,
              'pais'    => $event->user->country,
              'cuenta'  => $event->user->id,
        ];

        Mail::send('mail.contactBroker', $fields, function ($message) use ($fields) {
            $message->from($fields['email']);
            $message->subject('New contact from Berlinger');
            $message->to('info@berlingercapital.com');
        });
    }
}
