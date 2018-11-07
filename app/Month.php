<?php

namespace Tradesys;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $fillable = ['month','code'];
    
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
