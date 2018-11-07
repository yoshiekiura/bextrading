<?php

namespace Tradesys;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
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
       abort(401, 'Esta acción no está autorizada.');
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

}
