<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Models\RaceSponsor;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function adminSponsorPanel()
    {
        $sponsors = Sponsor::all();
        return view('admin.Sponsors.adminSponsorPanel', compact('sponsors'));
    }
    public function newSponsorForm()
    {
        return view('admin.Sponsors.adminSponsorForm');
    }

    public function adminSaveSponsor(Request $request)
    {

        $sponsors = new Sponsor;
        $sponsors->name = $request->input('name');
        $sponsors->cif = $request->input('cif');
        $ruta_imagen = "";
        $location = str_replace(" ", "", 'images\sponsor_icon\ ');
        try {
            $tmp_nom = $_FILES['icon']['tmp_name'];
            $name = $_FILES['icon']['name'];
            $file = $request->input('cif');
            $path = pathinfo($name);
            $ext = $path['extension'];
            $ruta_imagen = $file . "." . $ext;
            move_uploaded_file($tmp_nom, $location . $ruta_imagen);
            $sponsors->icon = $ruta_imagen;
        } catch (\Throwable $th) {
            echo ($th->getMessage());
            $sponsors->icon = "null";
        }
        $sponsors->address = $request->input('address');
        $sponsors->principal_page = $request->input('principal_page');
        $sponsors->save();
        return redirect(action([SponsorController::class, 'adminSponsorPanel']));
    }

    public function editSponsorsForm($id)
    {
        try {
            $aux = Sponsor::where('id', intval($id))->get(); //se cambio esta linea (solucion)
            $sponsor = $aux[0]; //
        } catch (\Throwable $th) {
            $sponsor = "x";
        }
        return view('admin.Sponsors.adminSponsorEditForm', compact('sponsor'));
    }

    public function saveEditSponsorForm($id, Request $request)
    {
        $aux = Sponsor::where('id', intval($id))->get(); //se cambio esta linea (solucion)
        $nombre = $aux[0]->icon;
        Sponsor::where('id', $id)->update(
            [
                'name' => $request->input('name'),
                'cif' => $request->input('cif'),
                'address' => $request->input('address'),
                'principal_page' => $request->input('principal_page')
            ]
        );
        if ($_FILES['icon']['name'] != "") {
            try {
                $ruta_imagen = "";
                $location = str_replace(" ", "", 'images\sponsor_icon\ ');
                $tmp_nom = $_FILES['icon']['tmp_name'];
                $ruta_imagen = $nombre;
                move_uploaded_file($tmp_nom, $location . $ruta_imagen);
            } catch (\Throwable $th) {
                echo ($th->getMessage());
            }
        }
        return redirect(route("adminSponsorsPanel"));
    }

    public function showPdfForm($id)
    {
        try {
            $aux = Sponsor::where('id', intval($id))->get();
            $races = \App\Models\Race::all();
            $sponsor = $aux[0]; //
        } catch (\Throwable $th) {
            $sponsor = "x";
        }
        return view('admin.Sponsors.generatePdfSponsor', compact('sponsor', 'races'));
    }

    public function generatePDF($id, Request $request)
    {
        $aux = Sponsor::where('id', intval($id))->get();
        $sponsor = $aux[0];
        $raux = $request->input('races');
        $races = [];
        $total = 0;
        try {
            $n = sizeof($raux);
        } catch (\Throwable $th) {
            $n = 0;
        }
        for ($i = 0; $i < $n; $i++) {
            $RaceSPonsor=new RaceSponsor;
            $RaceSPonsor->sponsors_id=$id;
            array_push($races, explode("/", $raux[$i]));
            $total += intval($races[$i][2]);
            $RaceSPonsor->races_id=$races[$i][0];
            $RaceSPonsor->save();
        }

        $costo=0;
        if ($sponsor->principal_page =="si") {
            $costo=1000;
        }
        $total +=$costo;
        $pdf = Pdf::loadView('admin.Sponsors.sponsorPDF', compact('sponsor', 'races', 'total','costo'));
        return $pdf->download('Informacion.pdf');
    }
}