<?php

use App\Models\Docteur;
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
});
Route::get('hopital/{id}', function ($id) {
    $hopital = Hopital::find($id);
    return view('hopital', compact('hopital'));
})->name('hopital');
