<?php

    namespace Tradesys;

    use Illuminate\Database\Eloquent\Model;

    class Product extends Model
    {

        protected $fillable = ['category_id', 'name', 'symbol', 'leverage','marketval'];


        public function tickets()
        {
            return $this->hasMany(Ticket::class);
        }

        public function exchanges()
        {
            return $this->hasMany(Exchange::class);
        }

        public function category()
        {
            return $this->belongsTo(Category::class);
        }

    }
