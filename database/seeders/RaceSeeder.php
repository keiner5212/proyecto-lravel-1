<?php

namespace Database\Seeders;

use App\Models\Race;
use Illuminate\Database\Seeder;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nombres = ["r1", "r2", "r3", "r4", "r5", "r6", "r7", "r8"];
        $descrip = ["desc r1", "desc r2", "desc r3", "desc r4", "desc r5", "desc r6", "desc r7", "desc r8"];
        $mapas = [
            "https://acortar.link/YBSJVF", //links acortados para mayor comodidad
            "https://acortar.link/MvwS9L",
            "https://acortar.link/UDCHRu",
            "https://acortar.link/rrTaoA",
            "https://acortar.link/KIbMTz",
            "https://acortar.link/rrlnov",
            "https://acortar.link/8HclkH",
            "https://acortar.link/p8Z8xf"
        ];
        $start = ["inicio", "inicio", "inicio", "inicio", "inicio", "inicio", "inicio", "inicio"];

        for ($i = 0; $i < sizeof($nombres); $i++) {
            $race = new Race;
            $race->name = $nombres[$i];
            $race->description = $descrip[$i];
            $race->unveness = rand(2, 15);
            $race->map = $mapas[$i];
            $race->maxParticipants = rand(5, 10);
            $race->km = rand(5, 10);
            $race->date = date("01-01-0001");
            $race->dateTime = "00:00";
            $race->startPoint = $start[$i];
            $race->promoteInfo = strval($i) . ".jpg";
            $race->promoteTax = round((rand(3104, 10234) / 10.87446656), 2);
            $race->active = true;
            $race->save();
        }
    }
}
