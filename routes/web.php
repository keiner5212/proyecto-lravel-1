<?php

use App\Http\Controllers\RacesController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsurerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Show welcome page
Route::get('/', [HomeController::class, 'principalPage'])->name('principal');
//searches
Route::put('/', [HomeController::class, 'principalPage']);

// Show principal page
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/closeAdmin', [HomeController::class, 'closeAdmin'])->middleware('isAdmin');

//RACES

// Admin

// Show race panel
Route::get('/adminRacesPanel', [RacesController::class, "adminRacesPanel"])->name('adminRacesPanel')->middleware('isAdmin');
// Show race form
Route::get('/adminShowRaceForm', [RacesController::class, "adminNewRaceForm"])->middleware('isAdmin');
// Save race form
Route::post('/adminSaveRaceForm', [RacesController::class, "adminSaveRaceForm"])->middleware('isAdmin');
// Show runners X race
Route::get('/adminShowRunnersXRace/{race}', [RacesController::class, "adminShowRunnersXRace"])->name('adminShowRunnersXRace')->middleware('isAdmin');
// Show edit race form
Route::get('/adminShowEditRaceForm/{id}', [RacesController::class, "adminShowEditRaceForm"])->name('adminShowEditRaceForm')->middleware('isAdmin');
// Save edit race form
Route::put('/adminSaveEditRaceForm/{id}', [RacesController::class, "adminSaveEditRaceForm"])->name('adminSaveEditRaceForm')->middleware('isAdmin');
// Set active or inactive
Route::get('/setOnRace/{id}', [RacesController::class, "isActive"])->name('setOnRace')->middleware('isAdmin');
Route::get('/setOffRace/{id}', [RacesController::class, "isInactive"])->name('setOffRace')->middleware('isAdmin');
//Show add photo race form
Route::get('/adminRacesAddPhoto/{id}', [RacesController::class, "adminRacesAddPhoto"])->name('adminRacesAddPhoto')->middleware('isAdmin');
//Save add photo race form
Route::put('/adminSaveRacesAddPhoto/{id}', [RacesController::class, "adminSaveRacesAddPhoto"])->name('adminSaveRacesAddPhoto')->middleware('isAdmin');
// Show photos
Route::get('/adminShowRacePhotos/{id}', [RacesController::class, "adminShowRacePhotos"])->name('adminShowRacePhotos')->middleware('isAdmin');
// Apply points of race
Route::get('/{id}/setPointsOfRace', [RacesController::class, "applyPointsOfRace"])->name('setPointsOfRace')->middleware('isAdmin');

// General users

// Show info of race
Route::get('/{id}/infoRace', [HomeController::class, "infoRace"])->name('infoRace');
// Show the information of results of a race
Route::get('/{id}/infoRace/scores', [HomeController::class, "showScoresOfRace"])->name('showScoresOfRace');
Route::get('/{id}/infoRace/mascScores', [HomeController::class, "showMascScoresOfRace"])->name('showMascScoresOfRace');
Route::get('/{id}/infoRace/femScores', [HomeController::class, "showFemScoresOfRace"])->name('showFemScoresOfRace');
Route::get('/{id}/infoRace/MR20Scores', [HomeController::class, "showmr20ScoresOfRace"])->name('showMR20ScoresOfRace');
Route::get('/{id}/infoRace/MR30Scores', [HomeController::class, "showmr30ScoresOfRace"])->name('showMR30ScoresOfRace');
Route::get('/{id}/infoRace/MR40Scores', [HomeController::class, "showmr40ScoresOfRace"])->name('showMR40ScoresOfRace');
Route::get('/{id}/infoRace/MR50Scores', [HomeController::class, "showmr50ScoresOfRace"])->name('showMR50ScoresOfRace');
Route::get('/{id}/infoRace/MR60Scores', [HomeController::class, "showmr60ScoresOfRace"])->name('showMR60ScoresOfRace');

// Show the photos of a race
Route::get('/{id}/infoRace/Photos', [HomeController::class, "showPhotosOfRace"])->name('showPhotos');

// Show preInscription
Route::get('/{id}/infoRace/preInscription', [HomeController::class, "showPreInscriptionOfRace"])->name('showPreInscription');
//  Show inscription
Route::get('/{id}/infoRace/inscriptionPro', [HomeController::class, "showInscriptionOfRacePro"])->name('showInscriptionOfRacePro');
Route::post('/{id}/infoRace/inscriptionPro/validate', [HomeController::class, "inscriptionValidateFormPro"])->name('inscriptionValidateFormPro');
Route::get('/{id}/infoRace/inscriptionOpen', [HomeController::class, "showInscriptionOfRaceOpen"])->name('showInscriptionOfRaceOpen');
Route::post('/{id}/infoRace/inscriptionOpen/validate', [HomeController::class, "inscriptionValidateFormOpen"])->name('inscriptionValidateFormOpen');
Route::get('/{idRace}/infoRace/inscriptionOpen/{idUser}/purchase', [HomeController::class, "inscriptionPurchase"])->name('inscriptionPurchase');
Route::get('/{idRace}/infoRace/inscriptionOpen/{idUser}/purchase/receipt', [HomeController::class, "inscriptionPurchaseReceipt"])->name('inscriptionPurchaseReceipt');





//INSURERS

// Show insurer panel
Route::get('/adminInsurersPanel', [InsurerController::class, 'adminInsurersPanel'])->name('adminInsurersPanel')->middleware('isAdmin');
// Show insurer form
Route::get('/adminShowInsurerForm', [InsurerController::class, "adminNewInsurerForm"])->middleware('isAdmin');
// Save insurer form
Route::post('/adminSaveInsurerForm', [InsurerController::class, "adminSaveInsurerForm"])->middleware('isAdmin');
// Show edit insurer form
Route::get('/adminShowEditInsurerForm/{id}', [InsurerController::class, "adminShowEditInsurerForm"])->name('adminShowEditInsurerForm')->middleware('isAdmin');
// Save edit insurer form
Route::put('/adminSaveEditInsurerForm/{id}', [InsurerController::class, "adminSaveEditInsurerForm"])->name('adminSaveEditInsurerForm')->middleware('isAdmin');
// Set active or inactive
Route::get('/setOnInsurer/{id}', [InsurerController::class, "isActive"])->name('setOnInsurer');
Route::get('/setOffInsurer/{id}', [InsurerController::class, "isInactive"])->name('setOffInsurer');


//SPONSORS
// Show sponsor panel
Route::get('/adminSponsorsPanel', [SponsorController::class, 'adminSponsorPanel'])->name('adminSponsorsPanel')->middleware('isAdmin');
// Show sponsor form
Route::get('/showSponsorsForm', [SponsorController::class, 'newSponsorForm'])->name('showSponsorsForm')->middleware('isAdmin');
// Save sponsor form
Route::post('/adminSponsorsPanel', [SponsorController::class, 'adminSaveSponsor'])->middleware('isAdmin');
Route::get('/showSponsorsEditForm/{id}', [SponsorController::class, "editSponsorsForm"])->name('showSponsorsEditForm')->middleware('isAdmin');
Route::put('/saveSponsorsEditForm/{id}', [SponsorController::class, "saveEditSponsorForm"])->name('saveSponsorsEditForm')->middleware('isAdmin');
// Show sponsor pdf form
Route::get('/showSponsorsPDFForm/{id}', [SponsorController::class, 'showPdfForm'])->name('showSponsorsPDFForm')->middleware('isAdmin');
Route::put('/generatePDF/{id}', [SponsorController::class, 'generatePDF'])->name('generatePDF')->middleware('isAdmin');
