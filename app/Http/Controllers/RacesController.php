<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\Race;
use Illuminate\Support\Facades\Storage;

class RacesController extends Controller
{
    // Show races panel
    public function adminRacesPanel()
    {
        $races = Race::all();
        return view('admin.races.adminRacesPanel', compact('races'));
    }

    // New insurer

    // Show new form for race
    public function adminNewRaceForm()
    {
        return view('admin.races.adminRacesForm');
    }

    // Save of new form for races
    public function adminSaveRaceForm(Request $request)
    {
        $race = new Race;
        $race->name = $request->input('name');
        $race->description = $request->input('description'); //quitamos las comillas
        $race->unveness = $request->input('unveness');
        $race->map = $request->input('map');
        $race->maxParticipants = $request->input('maxParticipants');
        $race->km = $request->input('km');
        $race->date = $request->input('date');
        $race->dateTime = $request->input('dateTime');
        $race->startPoint = $request->input('startPoint');

        $ruta_imagen = "";
        $location = str_replace(" ", "", 'images\races_images\ ');
        try {
            $tmp_nom = $_FILES['promoteInfo']['tmp_name'];
            $name = $_FILES['promoteInfo']['name'];
            $file = $request->input('name') . strval(rand(6, 23456765432));
            $path = pathinfo($name);
            $ext = $path['extension'];
            $ruta_imagen = $file . "." . $ext;
            move_uploaded_file($tmp_nom, $location . $ruta_imagen);
            $race->promoteInfo = $ruta_imagen;
        } catch (\Throwable $th) {
            echo ($th->getMessage());
            $race->promoteInfo = "null";
        }

        $race->promoteTax = $request->input('promoteTax');
        $race->save();
        return redirect(route("adminRacesPanel"));
    }

    // Show runners x race

    public function adminShowRunnersXRace(Race $race)
    {
        $runners = $race->users;
        return view('admin.races.adminRacesXRunners', ['runners' => $runners, 'race' => $race]);
    }

    // Edit race

    // Show form for existent race
    public function adminShowEditRaceForm($id)
    {
        try {
            $aux = Race::where('id', intval($id))->get();
            $race = $aux[0];
        } catch (\Throwable $th) {
            $race = "x";
        }
        return view('admin.races.adminRacesEditForm', compact('race'));
    }

    // Save on existent race
    public function adminSaveEditRaceForm($id, Request $request)
    {
        $aux = Race::where('id', intval($id))->get();
        $nombre = $aux[0]->promoteInfo;
        Race::where('id', $id)->update(
            [
                'description' => $request->input('description'),
                'name' => $request->input('name'),
                'unveness' => $request->input('unveness'),
                'map' => $request->input('map'),
                'maxParticipants' => $request->input('maxParticipants'),
                'km' => $request->input('km'),
                'date' => $request->input('date'),
                'dateTime' => $request->input('dateTime'),
                'startPoint' => $request->input('startPoint'),
                'promoteTax' => $request->input('promoteTax')
            ]
        );
        if ($_FILES['promoteInfo']['name'] != "") {
            try {
                $ruta_imagen = "";
                $location = str_replace(" ", "", 'images\races_images\ ');
                $tmp_nom = $_FILES['promoteInfo']['tmp_name'];
                $ruta_imagen = $nombre;
                move_uploaded_file($tmp_nom, $location . $ruta_imagen);
            } catch (\Throwable $th) {
                echo ($th->getMessage());
            }
        }
        return redirect(route("adminRacesPanel"));
    }

    // Put active or inactive

    // Set active on race
    public function isActive($id)
    {
        Race::where('id', $id)->update(['active' => 1]);
        return redirect(route("adminRacesPanel"));
    }

    // Set inactive on race
    public function isInactive($id)
    {
        Race::where('id', $id)->update(['active' => 0]);
        return redirect(route("adminRacesPanel"));
    }
    //Show add photo races

    public function adminRacesAddPhoto($id)
    {
        try {
            $aux = Race::where('id', intval($id))->get();
            $race = $aux[0];
        } catch (\Throwable $th) {
            $race = "x";
        }
        return view('admin.races.adminRacesAddPhoto', compact('race'));
    }

    public function adminSaveRacesAddPhoto($id, Request $request)
    {
        $aux=new Photo;
        $aux->races_id=$id;
        $aux->altText="Imagen de la carrera: ".$id;
        
        $ruta_imagen = "";
        $temp='images\races_images\Race_img_indv\ ';
        $location = str_replace(" ", "",$temp );
        try {
            $tmp_nom = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            $file = $id."__". strval(rand(6, 23456765432));
            $path = pathinfo($name);
            $ext = $path['extension'];
            $ruta_imagen = $file . "." . $ext;
            move_uploaded_file($tmp_nom, $location . $ruta_imagen);
            $aux->route = $ruta_imagen;
        } catch (\Throwable $th) {
            echo ($th->getMessage());
            $aux->route = "null";
        }
        $aux->save();
    }

    public function adminShowRacePhotos($id){
        try {
            $photos = Photo::where('races_id', intval($id))->get();
        } catch (\Throwable $th) {
            $photos = "x";
        }
        return view('admin.races.adminRacePhotosPanel', compact('photos'));
    }
}
