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
        $nombres = ["i1", "i2", "i3", "i4", "i5", "i6", "i7", "i8", "i9", "i10", "i11", "i12", "i13"];
        $descrip = ["desc r1", "desc r2", "desc r3", "desc r4", "desc r5", "desc r6", "desc r7", "desc r8", "desc r9", "desc r10", "desc r11", "desc r12", "desc r13"];
        $mapas = [
            "https://acortar.link/YBSJVF", //links acortados para mayor comodidad
            "https://acortar.link/MvwS9L",
            "https://acortar.link/UDCHRu",
            "https://acortar.link/rrTaoA",
            "https://acortar.link/KIbMTz",
            "https://acortar.link/rrlnov",
            "https://acortar.link/8HclkH",
            "https://acortar.link/p8Z8xf",
            "https://acortar.link/rrTaoA",
            "https://acortar.link/KIbMTz",
            "https://acortar.link/rrlnov",
            "https://acortar.link/8HclkH",
            "https://acortar.link/p8Z8xf"
        ];
        $start = ["inicio", "inicio", "inicio", "inicio", "inicio", "inicio", "inicio", "inicio", "inicio", "inicio", "inicio", "inicio", "inicio"];

        for ($i = 0; $i < sizeof($nombres); $i++) {
            $race = new Race;
            $race->name = $nombres[$i];
            $race->description = $descrip[$i];
            $race->unveness = rand(2, 15);
            $race->map = $mapas[$i];
            $race->maxParticipants = rand(5, 10);
            $race->km = rand(5, 10);
            $race->date = date('2001/01/01');
            $race->dateTime = "00:00";
            $race->startPoint = $start[$i];
            $race->distributedPoints = 1;
            $race->promoteInfo = strval($i) . ".jpg";
            $race->promoteTax = round((rand(3104, 10234) / 10.87446656), 2);
            $race->active = true;
            $race->save();
        }
    }
}
