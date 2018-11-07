<?php

namespace Tradesys;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{

    protected $fillable = ['year'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
