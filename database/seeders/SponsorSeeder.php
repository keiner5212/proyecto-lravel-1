<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Seeder;
class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nombres=["BMW","Campo Frio","crypto.com", "DHL","McDonald's","Michelin","SaudiAramco"];

        for ($i=0; $i <sizeof($nombres); $i++) { 
            $Sponsor=new Sponsor;
            $Sponsor->name=$nombres[$i];
            $Sponsor->cif=strval(rand(100000000,999999999));
            $Sponsor->icon=str_replace(" ","",$nombres[$i]).".jpg";
            $Sponsor->address=str_replace(" ","",$nombres[$i])."@gmail.com";
            $Sponsor->principal_page = ($i%2==0) ? "si" : "no";
            $Sponsor->active=true;
            $Sponsor->save();
        }
    }
}
