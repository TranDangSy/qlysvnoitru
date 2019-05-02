<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'name',
        'department_id',
        'gender',
        'date_of_birth',
        'address',
        'salary',
        'date_start',
        'position',
        'status',
    ];

    public function department()
    {
    	return $this->belongsTo(Department::class)->withDefault();
    }
}
