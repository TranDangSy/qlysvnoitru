<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
    	'name',
    	'age',
    	'gender',
    	'avatar',
    	'status',
    	'note',
    	'birth_of_date',
        'id_card',
        'room_id',
    ];

    public function room()
    {
    	return $this->belongsTo(Room::class)->withDefault();
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
