<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class RunnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Runners = ["Julian", "Oscar", "Marta", "Esteban", "Willy", "Lucas", "Lorena", "Erik"];

        for ($i = 0; $i < sizeof($Runners); $i++) {
            $Runner = new User;
            $Runner->name = $Runners[$i];
            $Runner->email = str_replace(" ", "", $Runners[$i]) . "@gmail.com";
            $Runner->password = "$2y$10$4P3RC6NWOdDuZAS964jT8e2ywfLZqGLI9ZxOtI/GhCiAnQwxqjLdq"; //0000000000
            $Runner->birth = date("01-01-0001");
            $Runner->save();
        }
    }
}