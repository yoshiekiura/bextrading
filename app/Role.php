<?php

namespace Tradesys;

use Illuminate\Database\Eloquent\Model;
use Tradesys\User;

class Role extends Model
{
    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

}
