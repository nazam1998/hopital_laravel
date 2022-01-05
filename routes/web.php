<?php

use App\Models\Docteur;
use App\Models\Dossier;
use App\Models\Hopital;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $hopitals = Hopital::all();
    return view('welcome', compact('hopitals'));
})->name('welcome');
Route::get('hopital/{id}', function ($id) {
    $hopital = Hopital::find($id);
    $locals = $hopital->locals;
    $consultations = [];
    foreach ($locals as $local) {
        foreach ($local->consultations as $consultation)
            array_push($consultations, $consultation);
    }
    $consultations = collect($consultations)->sortBy('date')->all();
    
    return view('hopital', compact('hopital', 'consultations'));
})->name('hopital');


Route::get('hopital/{id}/patients', function ($id) {
    $hopital = Hopital::find($id);
    $locals = $hopital->locals;
    $consultations = [];
    $patients = [];
    foreach ($locals as $local) {
        foreach ($local->consultations as $consultation)
            array_push($consultations, $consultation);
            array_push($patients,$consultation->patient);
    }
    $patients = array_unique($patients);
    $consultations = collect($consultations)->sortBy('date')->all();
    $patients = collect($patients)->all();

    return view('patients.index', compact('patients'));
})->name('hopital.show');

Route::get('patients', function () {
    $patients = Patient::all();
    return view('patients.index', compact('patients'));
})->name('patients');

Route::get('patient/{id}', function ($id) {
    $patient = Patient::where('registre', $id)->first();
    return view('patients.show', compact('patient'));
})->name('patient.show');

Route::get('patient/{id}/dossier', function ($id) {
    $patient = Patient::where('registre', $id)->first();
    return view('dossiers.index', compact('patient'));
})->name('dossier.index');


Route::get('patient/{idPatient}/dossier/{id}', function ($idPatient, $id) {
    $patient = Patient::where('registre', $idPatient)->first();
    $dossier = Dossier::find($id);
    return view('dossiers.show', compact('patient', 'dossier'));
})->name('dossier.show');
