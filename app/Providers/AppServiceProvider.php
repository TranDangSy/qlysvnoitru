<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Student;
use App\Room;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // $students = Student::all();
        // foreach ($students as $student) {
        //     // dd($student->rooms);
        //     foreach ($student->rooms as $room) {
        //         echo $room->name . "<br/>";
        //     }
        // }
        // $rooms = Room::all();
        // foreach ($rooms as $room) {
        //     // dd($student->rooms);
        //     foreach ($room->students as $student) {
        //         echo $student->name . "<br/>";
        //     }
        // }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
