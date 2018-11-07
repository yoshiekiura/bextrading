<?php

namespace Tradesys\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Tradesys\User;

class ClientNewBuy extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $fields;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $fields)
    {
        $this->user   = $user;
        $this->fields = $fields;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.ClientPurchaseNotify')
            ->from('noreply@myemaildomain.net')
            ->subject('Nueva Compra de Cliente');
    }
}
