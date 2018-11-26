<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
    	'name',
    	'image',
    	'number_bed',
    	'price',
        'water_price',
        'electric_price',
    	'status',
    ];

    public function students()
    {
    	return $this->hasMany(Student::class);
    }

    public function payments()
    {
        return $this->hasMany(Room::class);
    }

}
