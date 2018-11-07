<?php

namespace Tradesys\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Tradesys\Ticket;
use Tradesys\Trade;
use Tradesys\User;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user, $ability)
    {
        if ($user->hasRole(['admin'])) {
            return true;
        }
    }

    public function tradePass( User $user, Trade $trade)
    {
        return $user->id === $trade->user_id;
    }

     public function ticketPass( User $user, Ticket $ticket)
    {
        return $user->id === $ticket->user_id;
    }

    public function tradeSumary(User $user, Trade $trade)
    {
        return $user->id === $trade->user->id;
    }
}
