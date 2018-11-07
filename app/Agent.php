<?php

namespace Tradesys;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = ['name','email'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }


}
