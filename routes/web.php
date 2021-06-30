<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeanceController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/form-seances', [SeanceController::class, 'listData'])->middleware(['auth'])->name('form-seances');

Route::post('/form-seances', [SeanceController::class, 'saveSeance'])->middleware(['auth'])->name('form-seances');
    // return "Formulaire envoyé ! Film : ". request('film') ." Salle : " . request('salle') ." Date : " . request('date') ." Heure de début : " . request('debut');

Route::get('/display-seances', function () {
    return view('display-seances');
})->middleware(['auth'])->name('display-seances');



require __DIR__.'/auth.php';

// Lien utiles : https://laravel.com/docs/5.0/eloquent#introduction
// https://nouvelle-techno.fr/actualites/laravel-les-requetes-simples-en-base-de-donnees
