<?php

use Faker\Generator as Faker;
use App\Student;
use App\Room;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    	'age' => 18,
    	'gender' => 1,
    	'avatar' => '',
    	'status' => 1,
    	'note' => '',
    	'birth_of_date' => '2018-7-18',
    	'id_card' => 0300034567,
        'room_id' => $faker->randomElement(Room::pluck('id')),
    ];
});
