<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'email',
        'date_of_birth',
        'address',
        'phone',
    ];
}
