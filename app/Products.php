<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'name',
        'categories_id',
        'image',
        'description',
        'price',
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class)->withDefault();
    }
}
