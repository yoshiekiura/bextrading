<?php

namespace Tradesys\Mail;

use Tradesys\Http\Requests\ClientWithdrawFormRequest;
use Tradesys\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClientWithdrawalForm extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $fecha;
    public $data;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $data)
    {
        $this->user = $user;
        $this->data =  $data;
        $this->fecha = Carbon::now();
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.ClientWithdrawalForm')
            ->from('noreply@myemaildomain.net')
            ->subject('Retiro de Fondos');
    }
}
