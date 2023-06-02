<?php

namespace Database\Seeders;

use App\Models\Insurer;
use Illuminate\Database\Seeder;
class InsurerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nombres = ["i1", "i2", "i3", "i4", "i5", "i6", "i7", "i8", "i9", "i10", "i11", "i12", "i13"];

        for ($i=0; $i <sizeof($nombres); $i++) {
            $Insurer=new Insurer;
            $Insurer->name=$nombres[$i];
            $Insurer->cif=strval(rand(100000000,999999999));
            $Insurer->address=str_replace(" ","",$nombres[$i])."@gmail.com";
            $Insurer->tax=round((rand(3104, 10234)/10.874656),2);
            $Insurer->active=true;
            $Insurer->save();
        }
    }
}
