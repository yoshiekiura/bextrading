<?php

namespace Tradesys\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Tradesys\User;

class WelcometoMyCgo extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.welcome-bextrade')
            ->from('noreply@myemaildomain.net')
            ->subject('Bienvenido a Bextrading');
        // ->attach(public_path('rep/Instrucciones_transferencia.pdf'));
    }
}
