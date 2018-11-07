<?php

namespace Tradesys;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tradesys\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'phone', 'mobile', 'idn', 'nacionalidad', 'city', 'state', 'country', 'ocupacion', 'civil', 'patrimonio', 'annual', 'amount', 'origen_fondos', 'cant_ahorros', 'residente', 'objetivo', 'beneficiary', 'bank', 'agente'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
            'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function agents()
    {
        return $this->belongsToMany(Agent::class);
    }

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function exchanges()
    {
        return $this->hasMany(Exchange::class);
    }

    public static function brokerGuaranty($user)
    {
        $guarantymake = Trade::where('user_id', $user)
                ->whereIn('action', ['Broker Guaranty'])
                ->sum('credit');

        $guarantypay = Trade::where('user_id', $user)
                ->whereIn('action', ['Broker Guaranty Payment'])
                ->sum('debit');

        $guaranty = $guarantymake - $guarantypay;

        return $guaranty;
    }

    public static function getBalance($user)
    {
        $utrades = Trade::where('user_id', $user);
        $credit  = $utrades->sum('credit');
        $debit   = $utrades->sum('debit');
        $balance = $credit - $debit;
        return $balance;
    }

    /*
     *
     * activar despues de crear la migracion de datos
     */

    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Action is not authorized.');
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
