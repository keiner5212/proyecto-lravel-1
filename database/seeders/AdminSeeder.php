<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $user = new User();
            $user->name = "admin";
            $user->email = "admin@bikeroll.com";
            $user->password = "$2y$10$4P3RC6NWOdDuZAS964jT8e2ywfLZqGLI9ZxOtI/GhCiAnQwxqjLdq"; //0000000000
            $user->birth = date("01-01-0001");
            $user->role = "admin";
            $user->save();
        }
    }
}
