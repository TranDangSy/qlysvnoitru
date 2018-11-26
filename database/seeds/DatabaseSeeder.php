<?php

use Illuminate\Database\Seeder;
use App\Student;
use App\Room;
use App\Payment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        $rooms = factory(Room::class, 10)->create();
        $students = factory(Student::class, 10)->create();
        // $roomIds = $rooms->pluck('id');
        $payments = factory(Payment::class, 10)->create();

        // foreach ($payments as $payment){
        //     $payment->rooms()->sync($roomIds);
        // }
    }
}
