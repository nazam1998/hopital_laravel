<?php

use App\Helpers\PaginationHelper;
use App\Models\Consultation;
use App\Models\Docteur;
use App\Models\Dossier;
use App\Models\Hopital;
use App\Models\Local;
use App\Models\Maladie;
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
    $consultations = Consultation::whereIn('locals_id', $locals_id)->orderBy('date', 'DESC')->orderBy('heure', 'DESC')->get();
    $datas = [];

    foreach ($consultations as $consultation) {
        $patient = Patient::where('registre', $consultation->patients_id)->first();
        $local = Local::where('id', $consultation->locals_id)->first();
        $docteur = Docteur::where('id', $consultation->docteurs_id)->first();
        $status = StatutConsultation::where('id', $consultation->statut_consultations_id)->first();
        $dossier = Dossier::where('consultations_id', $consultation->id)->first();
        if ($dossier != null) {
            $maladie = Maladie::where('id', $dossier->maladies_id)->first();
        } else {
            $maladie = null;
        }
        $myData = [
            'consultation' => $consultation,
            'patient' => $patient,
            'local' => $local,
            'docteur' => $docteur,
            'status' => $status,
            'dossier' => $dossier,
            'maladie' => $maladie,
        ];
        array_push($datas, (object)($myData));
    }
    $showPerPage = 20;

    $consultations = collect($datas);
    $consultations = PaginationHelper::paginate($consultations, $showPerPage);
    // dd($consultations[0]->docteur);
    return view('hopital', compact('hopital', 'consultations'));
})->name('hopital');

Route::get('hopital/{id}/consultations/patient', function (Request $request, $id) {
    $hopital = Hopital::find($id);
    $locals_id = $hopital->locals->pluck('id');
    $patients = Patient::where('nom', 'LIKE', '%' . $request->nom . '%')->orWhere('prenom', 'LIKE', '%' . $request->nom . '%')->get();
    // dd($patients->pluck('registre'));
    $consultations = Consultation::whereIn('locals_id', $locals_id)->whereIn('patients_id', $patients->pluck('registre'))->orderBy('date', 'DESC')->orderBy('heure', 'DESC')->get();
    $datas = [];

    foreach ($consultations as $consultation) {
        $patient = Patient::where('registre', $consultation->patients_id)->first();
        $local = Local::where('id', $consultation->locals_id)->first();
        $docteur = Docteur::where('id', $consultation->docteurs_id)->first();
        $status = StatutConsultation::where('id', $consultation->statut_consultations_id)->first();
        $dossier = Dossier::where('consultations_id', $consultation->id)->first();
        if ($dossier != null) {
            $maladie = Maladie::where('id', $dossier->maladies_id)->first();
        } else {
            $maladie = null;
        }
        $myData = [
            'consultation' => $consultation,
            'patient' => $patient,
            'local' => $local,
            'docteur' => $docteur,
            'status' => $status,
            'dossier' => $dossier,
            'maladie' => $maladie,
        ];
        array_push($datas, (object)($myData));
    }
    $showPerPage = 20;

    $consultations = collect($datas);
    $consultations = PaginationHelper::paginate($consultations, $showPerPage);
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
