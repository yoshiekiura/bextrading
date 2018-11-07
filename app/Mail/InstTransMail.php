<?php

namespace Tradesys\Mail;

use Tradesys\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InstTransMail extends Mailable
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
        return $this->markdown('email.Trans_Banca')
            ->from('info@berlingercapital.com')
            ->subject('Transfer Instructions')
            ->attach(public_path('rep/wireinst.pdf'));
    }
}
