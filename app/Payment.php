<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
    	'price',
        'method',
    	'student_id',
        'room_id',
        'type_payment',
        'date',
    ];

    public function room()
    {
    	return $this->belongsTo(Room::class);
    }

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }
}
