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
        $Runners = ["Julian", "Oscar", "Marta", "Esteban", "Willy", "Lucas", "Lorena", "Erik", "Francisco", "Marta Torrejon", "Musa Bimbembe", "Francis Pachulya", "David Alba"];
        $Dni = ["11111111P", "11112331T", "11345656I", "13612311N", "17628123C", "12367183A", "13456789D", "67677713F", "13454444L", "67624581V", "75754789L", "62626713F", "13909079D"];

        for ($i = 0; $i < sizeof($Runners); $i++) {
            $Runner = new User;
            $Runner->name = $Runners[$i];
            $Runner->dni = $Dni[$i];
            $Runner->email = str_replace(" ", "", $Runners[$i]) . "@gmail.com";
            $Runner->password = "$2y$10$4P3RC6NWOdDuZAS964jT8e2ywfLZqGLI9ZxOtI/GhCiAnQwxqjLdq"; //0000000000
            $Runner->birth = date("01-01-0001");
            $Runner->save();
        }
    }
}
