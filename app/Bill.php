<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'customer_id',
        'employee_id',
        'date_order',
        'total',
        'payment',
    ];

    public function customer()
    {
    	return $this->belongsTo(Customers::class)->withDefault();
    }
    public function employee()
    {
    	return $this->belongsTo(Employees::class)->withDefault();
    }
}
