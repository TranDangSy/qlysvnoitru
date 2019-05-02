<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    protected $fillable = [
    	'name',
        'bill_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function bill()
    {
    	return $this->hasOne(Bill::class);
    }
    public function product()
    {
    	return $this->hasMany(Products::class)->withDefault();
    }
}
