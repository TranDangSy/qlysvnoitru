<?php

use Faker\Generator as Faker;
use App\Room;

$factory->define(Room::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    	'image' => '',
    	'number_bed' => 9,
    	'price' => 8,
    	'water_price'=> 2000,
    	'electric_price'=>1200,
    	'status' => 1,
    ];
});
