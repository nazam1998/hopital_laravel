<?php

use App\Models\Consultation;
use App\Models\Dossier;
use App\Models\Hopital;
use App\Models\Patient;
use App\Models\StatutConsultation;
use Illuminate\Http\Request;
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
    $locals_id = $hopital->locals->pluck('id');
    $consultations = Consultation::whereIn('locals_id', $locals_id)->orderBy('date', 'DESC')->orderBy('heure', 'DESC')->paginate(50);
    $docteurs = [];
    $patients = [];
    $dossiers = [];
    $maladies = [];
    $status = [];
    $locals = [];
    foreach ($consultations as $consultation) {
        array_push($patients, $consultation->patient);
        array_push($locals, $consultation->local);
        array_push($docteurs, $consultation->docteur);
        array_push($status, StatutConsultation::find($consultation->statut_consultations_id));
        if ($consultation->dossier) {
            array_push($maladies, $consultation->dossier->maladie);
            array_push($dossiers, $consultation->dossier);
        } else {
            array_push($dossiers, false);
            array_push($maladies, false);
        }
    }

    return view('hopital', compact('hopital', 'consultations', 'docteurs', 'maladies', 'patients', 'locals', 'dossiers','status'));
})->name('hopital');

Route::get('hopital/{id}/consultations/patient', function (Request $request, $id) {
    $hopital = Hopital::find($id);
    $locals_id = $hopital->locals->pluck('id');
    $patient = Patient::where('nom', 'LIKE', '%' . $request->nom . '%')->orWhere('prenom', 'LIKE', '%' . $request->nom . '%')->first();

    $consultations = Consultation::whereIn('locals_id', $locals_id)->where('patients_id', $patient->registre)->orderBy('date', 'DESC')->orderBy('heure', 'DESC')->paginate(50);
    return view('hopital', compact('hopital', 'consultations'));
})->name('patient.consultation');

Route::get('hopital/{id}/patients', function ($id) {
    $hopital = Hopital::find($id);
    $locals = $hopital->locals;
    $patients = [];
    foreach ($locals as $local) {
        foreach ($local->consultations as $consultation)
            array_push($patients, $consultation->patient);
    }
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
