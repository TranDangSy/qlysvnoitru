<?php

use Faker\Generator as Faker;
use App\Payment;
use App\Student;
use App\Room;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'price' => 1900,
        'method' => 'cash',
    	'student_id' => $faker->randomElement(Student::pluck('id')),
    	'room_id' => $faker->randomElement(Room::pluck('id')),
    	'type_payment' => 'tiền phòng',
    ];
});
