<?php

namespace Tradesys;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'entrydate',
        'user_id',
        'product_id',
        'fee_id',
        'month_id',
        'year_id',
        'action',
        'qty',
        'type',
        'expdate',
        'strike',
        'price',
        'marketvalue',
        'total',
        'status',
    ];

    protected $dates = ['expdate', 'entrydate'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trade()
    {
        return $this->hasOne(Trade::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function fee()
    {
        return $this->belongsTo(Fee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getTradesbyUser()
    {
        return $this->belongsTo();
    }

    public function month()
    {
        return $this->belongsTo(Month::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function getProductByCategory($query)
    {
        $category = Category::all();
        $query->where($category->description, $product->category->description);

        return $products;
    }

    public function scopeStatusOpen($query)
    {
        $query->whereNotNull('status')
            ->where('status', 'Open')
            ->whereIn('type', ['Call', 'Put'])
            ->orderBy('created_at', 'DESC');
    }

    public function scopeStatusClosed($query)
    {
        $query->whereNotNull('status')
            ->where('status', 'Closed')
            ->orderBy('created_at', 'DESC');
    }

    public function scopeDeposits($query)
    {
        $query->whereNotNull('action')
            ->whereIn('action', ['Account Funding', 'Aditional Funds', 'CGO Broker Guaranty', 'Credit'])
            ->orderBy('created_at', 'DESC');
    }

}
