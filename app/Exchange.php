<?php

namespace Tradesys;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Exchange extends Model
{
    protected $fillable = ['entry', 'user_id', 'product_id', 'action', 'amount', 'description', 'rate', 'qty', 'total', 'status'];

    protected $dates = ['entry'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function byTrade()
    {
        return new Exchange();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getAll()
    {
        return Exchange::where('user_id', Auth::user());
    }

    public function scopeStatusOpen($query)
    {
        $query->whereNotNull('status')
            ->where('status', 'Open')
            ->orderBy('created_at', 'DESC');
    }

    public function scopeStatusClosed($query)
    {
        $query->whereNotNull('status')
            ->where('status', 'Closed')
            ->orderBy('created_at', 'DESC');
    }

    public function scopeSumaCurrency($query)
    {
        $query->where('status', 'Open')
            ->sum('qty');
    }

}
