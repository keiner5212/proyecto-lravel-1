<?php

use App\Http\Controllers\RacesController;
use App\Http\Controllers\SponsorController;
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
Route::get('/', function () {
    return view('welcome');
});

// Show principal page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('isAdmin');

//RACES

// Show race panel
Route::get('/adminRacesPanel', [App\Http\Controllers\RacesController::class, "adminRacesPanel"])->name('adminRacesPanel')->middleware('isAdmin');
// Show race form
Route::get('/adminShowRaceForm', [App\Http\Controllers\RacesController::class, "adminNewRaceForm"])->middleware('isAdmin');
// Save race form
Route::post('/adminSaveRaceForm', [App\Http\Controllers\RacesController::class, "adminSaveRaceForm"])->middleware('isAdmin');
// Show runners X race
Route::get('/adminShowRunnersXRace/{race}', [App\Http\Controllers\RacesController::class, "adminShowRunnersXRace"])->name('adminShowRunnersXRace')->middleware('isAdmin');
// Show edit race form
Route::get('/adminShowEditRaceForm/{id}', [App\Http\Controllers\RacesController::class, "adminShowEditRaceForm"])->name('adminShowEditRaceForm')->middleware('isAdmin');
// Save edit race form
Route::put('/adminSaveEditRaceForm/{id}', [App\Http\Controllers\RacesController::class, "adminSaveEditRaceForm"])->name('adminSaveEditRaceForm')->middleware('isAdmin');
// Set active or inactive
Route::get('/setOnRace/{id}', [App\Http\Controllers\RacesController::class, "isActive"])->name('setOnRace')->middleware('isAdmin');
Route::get('/setOffRace/{id}', [App\Http\Controllers\RacesController::class, "isInactive"])->name('setOffRace')->middleware('isAdmin');
//Show add photo race form 
Route::get('/adminRacesAddPhoto/{id}', [App\Http\Controllers\RacesController::class, "adminRacesAddPhoto"])->name('adminRacesAddPhoto')->middleware('isAdmin');
//Save add photo race form 
Route::put('/adminSaveRacesAddPhoto/{id}', [App\Http\Controllers\RacesController::class, "adminSaveRacesAddPhoto"])->name('adminSaveRacesAddPhoto')->middleware('isAdmin');
// Show photos
Route::get('/adminShowRacePhotos/{id}', [App\Http\Controllers\RacesController::class, "adminShowRacePhotos"])->name('adminShowRacePhotos')->middleware('isAdmin');


//INSURERS

// Show insurer panel
Route::get('/adminInsurersPanel', [App\Http\Controllers\InsurerController::class, 'adminInsurersPanel'])->name('adminInsurersPanel')->middleware('isAdmin');
// Show insurer form
Route::get('/adminShowInsurerForm', [App\Http\Controllers\InsurerController::class, "adminNewInsurerForm"])->middleware('isAdmin');
// Save insurer form
Route::post('/adminSaveInsurerForm', [App\Http\Controllers\InsurerController::class, "adminSaveInsurerForm"])->middleware('isAdmin');
// Show edit insurer form
Route::get('/adminShowEditInsurerForm/{id}', [App\Http\Controllers\InsurerController::class, "adminShowEditInsurerForm"])->name('adminShowEditInsurerForm')->middleware('isAdmin');
// Save edit insurer form
Route::put('/adminSaveEditInsurerForm/{id}', [App\Http\Controllers\InsurerController::class, "adminSaveEditInsurerForm"])->name('adminSaveEditInsurerForm')->middleware('isAdmin');
// Set active or inactive
Route::get('/setOnInsurer/{id}', [App\Http\Controllers\InsurerController::class, "isActive"])->name('setOnInsurer');
Route::get('/setOffInsurer/{id}', [App\Http\Controllers\InsurerController::class, "isInactive"])->name('setOffInsurer');


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
