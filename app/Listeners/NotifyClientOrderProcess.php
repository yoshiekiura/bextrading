<?php

namespace Tradesys\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Tradesys\Events\NotifyClientAfterBuy;
use Tradesys\Mail\NotifyClientPurchaseOrder;

class NotifyClientOrderProcess
{

    /**
     * Handle the event.
     *
     * @param  NotifyClientAfterBuy  $event
     * @return void
     */
    public function handle(NotifyClientAfterBuy $event)
    {
        $user = $event->user;
        Mail::to($event->user->email)
              ->send(new NotifyClientPurchaseOrder($event->user));

    }
}
