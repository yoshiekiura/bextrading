<?php

namespace Tradesys;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $table    = 'fees';
    protected $fillable = ['amount', 'porcentaje'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
