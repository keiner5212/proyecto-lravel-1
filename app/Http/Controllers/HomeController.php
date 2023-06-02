<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Insurer;
use App\Models\Photo;
use App\Models\Race;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function closeAdmin()
    {
        Auth::logout();
        return redirect(route("principal"));
    }

    public function principalPage(Request $request)
    {
        $sponsors = Sponsor::where('principal_page', '=', 'si', 'and')->where('active', '=', 1)->get();
        $actualDate = date('Y-m-d');
        $fechaMes = date('Y-m-d', strtotime($actualDate . ' + 1 month'));
        $futureRaces = Race::where('date', '<', $fechaMes, 'and')->where('date', '>', $actualDate, 'and')->where('active', '=', 1)->orderBy('date', 'ASC')->take(4)->get();

        if ($request->input("search")) {
            $finishedRaces = Race::where('name', 'LIKE', $request->input("search"), 'and')->where('date', '<', $actualDate, 'and')->where('active', '=', 1, 'and')->where('distributedPoints', '=', 1)->get();
        } else {
            $finishedRaces = Race::where('date', '<', $actualDate, 'and')->where('active', '=', 1, 'and')->where('distributedPoints', '=', 1)->get();
        }

        return view('welcome', ['sponsors' => $sponsors, 'finishedRaces' => $finishedRaces, 'futureRaces' => $futureRaces]);
    }

    public function infoRace($id)
    {
        $sponsors = Sponsor::where('principal_page', '=', 'si', 'and')->where('active', '=', 1)->get();
        $aux = Race::where('id', intval($id))->get();
        $race = $aux[0];
        return view('paginesSecundaries/raceInfo', ['sponsors' => $sponsors, 'race' => $race]);
    }

    public function showScoresOfRace($id)
    {
        $sponsors = Sponsor::where('principal_page', '=', 'si', 'and')->where('active', '=', 1)->get();
        $race = Race::where('id', intval($id))->get()[0];
        $generalInscriptions = Inscription::with('users')->where("race_id", intval($id))->orderBy('time', 'ASC')->get();
        return view('paginesSecundaries/results/racesResult', ['sponsors' => $sponsors, "generalInscriptions" => $generalInscriptions, 'race' => $race]);
    }

    public function showMascScoresOfRace($id)
    {
        $sponsors = Sponsor::where('principal_page', '=', 'si', 'and')->where('active', '=', 1)->get();
        $race = Race::where('id', intval($id))->get()[0];
        $generalInscriptions = Inscription::with('users')->where("race_id", intval($id))->orderBy('time', 'ASC')->get();
        return view('paginesSecundaries/results/racesMascResult', ['sponsors' => $sponsors, "generalInscriptions" => $generalInscriptions, 'race' => $race]);
    }

    public function showFemScoresOfRace($id)
    {
        $sponsors = Sponsor::where('principal_page', '=', 'si', 'and')->where('active', '=', 1)->get();
        $race = Race::where('id', intval($id))->get()[0];
        $generalInscriptions = Inscription::with('users')->where("race_id", intval($id))->orderBy('time', 'ASC')->get();
        return view('paginesSecundaries/results/racesFemResult', ['sponsors' => $sponsors, "generalInscriptions" => $generalInscriptions, 'race' => $race]);
    }

    public function showmr20ScoresOfRace($id)
    {
        $sponsors = Sponsor::where('principal_page', '=', 'si', 'and')->where('active', '=', 1)->get();
        $race = Race::where('id', intval($id))->get()[0];
        $generalInscriptions = Inscription::with('users')->where("race_id", intval($id))->orderBy('time', 'ASC')->get();
        return view('paginesSecundaries/results/racesmr20Result', ['sponsors' => $sponsors, "generalInscriptions" => $generalInscriptions, 'race' => $race]);
    }

    public function showmr30ScoresOfRace($id)
    {
        $sponsors = Sponsor::where('principal_page', '=', 'si', 'and')->where('active', '=', 1)->get();
        $race = Race::where('id', intval($id))->get()[0];
        $generalInscriptions = Inscription::with('users')->where("race_id", intval($id))->orderBy('time', 'ASC')->get();
        return view('paginesSecundaries/results/racesmr30Result', ['sponsors' => $sponsors, "generalInscriptions" => $generalInscriptions, 'race' => $race]);
    }

    public function showmr40ScoresOfRace($id)
    {
        $sponsors = Sponsor::where('principal_page', '=', 'si', 'and')->where('active', '=', 1)->get();
        $race = Race::where('id', intval($id))->get()[0];
        $generalInscriptions = Inscription::with('users')->where("race_id", intval($id))->orderBy('time', 'ASC')->get();
        return view('paginesSecundaries/results/racesmr40Result', ['sponsors' => $sponsors, "generalInscriptions" => $generalInscriptions, 'race' => $race]);
    }

    public function showmr50ScoresOfRace($id)
    {
        $sponsors = Sponsor::where('principal_page', '=', 'si', 'and')->where('active', '=', 1)->get();
        $race = Race::where('id', intval($id))->get()[0];
        $generalInscriptions = Inscription::with('users')->where("race_id", intval($id))->orderBy('time', 'ASC')->get();
        return view('paginesSecundaries/results/racesmr50Result', ['sponsors' => $sponsors, "generalInscriptions" => $generalInscriptions, 'race' => $race]);
    }

    public function showmr60ScoresOfRace($id)
    {
        $sponsors = Sponsor::where('principal_page', '=', 'si', 'and')->where('active', '=', 1)->get();
        $race = Race::where('id', intval($id))->get()[0];
        $generalInscriptions = Inscription::with('users')->where("race_id", intval($id))->orderBy('time', 'ASC')->get();
        return view('paginesSecundaries/results/racesmr60Result', ['sponsors' => $sponsors, "generalInscriptions" => $generalInscriptions, 'race' => $race]);
    }

    //public function showGlobalScores(){}

    public function showPhotosOfRace($id)
    {
        $sponsors = Sponsor::where('principal_page', '=', 'si', 'and')->where('active', '=', 1)->get();
        $race = Race::where('id', intval($id))->get()[0];
        try {
            $photos = Photo::where('races_id', intval($id))->get();
        } catch (\Throwable $th) {
            $photos = "x";
        }
        return view('paginesSecundaries/racePhotos', ['sponsors' => $sponsors, "photos" => $photos, 'race' => $race]);
    }

    public function showPreInscriptionOfRace($id)
    {
        $aux = Race::where('id', intval($id))->get();
        $race = $aux[0];
        $sponsors = Sponsor::where('principal_page', '=', 'si', 'and')->where('active', '=', 1)->get();
        return view('paginesSecundaries/racePreInscription', ['race' => $race, 'sponsors' => $sponsors]);
    }

    public function showInscriptionOfRacePro($id)
    {
        $aux = Race::where('id', intval($id))->get();
        $race = $aux[0];
        $insurers = Insurer::where('active', '=', 1)->get();
        $sponsors = Sponsor::where('principal_page', '=', 'si', 'and')->where('active', '=', 1)->get();
        return view('paginesSecundaries/raceInscriptionPro', ['race' => $race, 'sponsors' => $sponsors, "insurers" => $insurers]);
    }

    public function inscriptionValidateFormPro($id, Request $request)
    {
        $aux = Race::where('id', intval($id))->get();
        $race = $aux[0];
        $insurers = Insurer::where('active', '=', 1)->get();
        $sponsors = Sponsor::where('principal_page', '=', 'si', 'and')->where('active', '=', 1)->get();
        $dni = $request->input('dni');
        $federated = $request->input('federated');
        try {
            $user = new User;
            $user->name = $request->input('name');
            $user->dni = $dni;
            $user->email = $request->input('email');
            $user->birth = $request->input('birth');
            $user->proOpen = $federated;
            $user->password = "$2y$10$4P3RC6NWOdDuZAS964jT8e2ywfLZqGLI9ZxOtI/GhCiAnQwxqjLdq";
            $user->save();
            $aux2 = User::where('dni', intval($dni))->get('id');
            $user_id = $aux2[0]['id'];
            $inscription = new Inscription;
            $inscription->user_id = $user_id;
            $inscription->race_id = $id;
            $inscription->insurer_id = 1;
            $inscription->dorsal = 0;
            $inscription->time = 0;
            $inscription->save();
            return redirect(route('infoRace', $race));
        } catch (\Throwable $th) {
            $missatge = "Ja existeix un participant amb aquesta identificació o numero de federat.";
            return view('paginesSecundaries/validateRaceInscriptionPro', ['race' => $race, 'sponsors' => $sponsors, "insurers" => $insurers, 'missatge' => $missatge]);
        }
    }

    public function showInscriptionOfRaceOpen($id)
    {
        $aux = Race::where('id', intval($id))->get();
        $race = $aux[0];
        $insurers = Insurer::where('active', '=', 1)->get();
        $sponsors = Sponsor::where('principal_page', '=', 'si', 'and')->where('active', '=', 1)->get();
        return view('paginesSecundaries/raceInscriptionOpen', ['race' => $race, 'sponsors' => $sponsors, "insurers" => $insurers]);
    }

    public function inscriptionValidateFormOpen($id, Request $request)
    {
        $aux2 = User::where('dni', $request->input('dni'))->get();
        $race = Race::where('id', intval($id))->first();
        $insurers = Insurer::where('active', '=', 1)->get();
        $sponsors = Sponsor::where('principal_page', '=', 'si', 'and')->where('active', '=', 1)->get();
        if (Inscription::where('user_id', intval($aux2[0]['id']), "and")->where('race_id', intval($race['id']))->count() == 0) {
            try {
                $inscription = new Inscription;
                $inscription->user_id = $aux2[0]['id'];
                $inscription->race_id = $id;
                $inscription->insurer_id = $request->input('insurer');
                $inscription->dorsal = 0;
                $inscription->time = 0;
                $inscription->save();
                $raceId = $id;
                $userId = $aux2[0]['id'];
                return redirect(route('inscriptionPurchase', [$raceId, $userId]));
            } catch (\Throwable $th) {
                $missatge = "Error al inscribir";
                return view('paginesSecundaries/validateRaceInscriptionPro', ['race' => $race, 'sponsors' => $sponsors, "insurers" => $insurers, 'missatge' => $missatge]);
            }
        } else {
            $missatge = "Ja existeix un participant amb aquesta identificació.";
            return view('paginesSecundaries/validateRaceInscriptionPro', ['race' => $race, 'sponsors' => $sponsors, "insurers" => $insurers, 'missatge' => $missatge]);
        }
    }

    public function inscriptionPurchase($raceId, $userId)
    {
        $race = Race::where('id', intval($raceId))->first();
        $sponsors = Sponsor::where('principal_page', '=', 'si', 'and')->where('active', '=', 1)->get();
        $user = User::where('id', intval($userId))->first();
        $inscription = Inscription::where('user_id', intval($userId), "and")->where('race_id', intval($raceId))->first();
        $insurer = Insurer::where("id", intval($inscription["insurer_id"]))->first();
        return view('paginesSecundaries/racePurchase', ['race' => $race, 'sponsors' => $sponsors, 'user' => $user,  "insurer" => $insurer]);
    }

    public function inscriptionPurchaseReceipt($raceId, $userId)
    {
        $inscription = Inscription::where('user_id', intval($userId), "and")->where('race_id', intval($raceId))->first();
        $insurer = Insurer::where("id", intval($inscription["insurer_id"]))->first();
        $race = Race::where('id', intval($raceId))->first();
        $user = User::where('id', intval($userId))->first();
        $aux = Inscription::where('user_id', intval($userId), "and")->where('race_id', intval($raceId))->update(['isPaid' => true]);

        $pdf = Pdf::loadView('paginesSecundaries.InscriptionPDF', compact('insurer', 'race', 'user'));
        return $pdf->download('Recibo.pdf');
    }
}
