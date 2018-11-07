<?php

namespace Tradesys\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactPageForm extends Mailable
{
    use Queueable, SerializesModels;
    public $fecha;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->fecha = Carbon::now();
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.ContactPageForm')
            ->from('noreply@myemaildomain.net')
            ->subject('Formulario de Contacto');
        ;
    }
}
