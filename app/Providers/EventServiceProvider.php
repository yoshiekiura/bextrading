<?php

namespace Tradesys\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Tradesys\Events\NewUser'        => [
            'Tradesys\Listeners\WelcometoNewUser',
            'Tradesys\Listeners\MailUserBankingInst',
            'Tradesys\Listeners\NotifyNewUserToAdmin',
        ],
        'Tradesys\Events\ContactAdviser' => [
            'Tradesys\Listeners\EmailQueryToAdmin',
            'Tradesys\Listeners\EmailRespToUser',
        ],
        'Tradesys\Events\NotifyClientAfterBuy' => [
            'Tradesys\Listeners\NotifyClientOrderProcess',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
