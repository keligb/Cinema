<?php

use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\ChargementController;
use App\Http\Controllers\ForfaitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AllController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

// Route::get('/home', function (){
//     return view('welcome');
// })->name('home');

Route::get('/', [FilmController::class, 'getAffiche'])->name('welcome');

Route::get('/home', [FilmController::class, 'getAffiche'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['admin'])->name('dashboard');

Route::get('/dashboard-user', function () {
    return view('dashboard-user');
})->middleware(['user'])->name('dashboard-user');

/* ----- CRUD SEANCES ADMIN----- */

Route::get('/form-seances', [SeanceController::class, 'listData'])->middleware(['admin'])->name('form-seances');

Route::post('/form-seances', [SeanceController::class, 'saveSeance'])->middleware(['admin'])->name('form-seances');

Route::get('/display-seances', [SeanceController::class, 'listSeance'])->middleware(['admin'])->name('display-seances');

Route::get('/delete/{seance_id}', [SeanceController::class, 'deleteSeance'])->middleware(['admin'])->name('delete');

Route::get('/update/{seance_id}', [SeanceController::class, 'updateSeance'])->middleware(['admin'])->name('update');

Route::post('/update', [SeanceController::class, 'storeSeance'])->middleware(['admin'])->name('store');

Route::get('/chargements', [ChargementController::class, 'display'])->middleware(['admin'])->name('chargements');

Route::post('/add-chargement', [ChargementController::class, 'save'])->middleware(['admin'])->name('addChargement');

Route::get('/update-chargement/{chargement_id}', [ChargementController::class, 'updateChargement'])->middleware(['admin'])->name('updateChargement');

Route::post('/save-chargement', [ChargementController::class, 'saveChargement'])->middleware(['admin'])->name('saveChargement');

Route::get('/delete-chargement/{chargement_id}', [ChargementController::class, 'deleteChargement'])->middleware(['admin'])->name('deleteChargement');
/* ----- CRUD FORFAITS ADMIN ----- */

// Route::get('/add-forfait', [ForfaitController::class, ''])->middleware(['admin'])->name('add-forfait');

Route::get('/add-forfait', [ForfaitController::class, 'displayView'])->middleware(['admin'])->name('add-forfait');

Route::post('/add-forfait-post', [ForfaitController::class, 'saveForfait'])->middleware(['admin'])->name('add-forfait-post');

Route::get('/display-forfaits', [ForfaitController::class, 'listForfaits'])->middleware(['admin'])->name('display-forfaits');

Route::get('/update-forfait/{forfait_id}', [ForfaitController::class, 'updateForfait'])->middleware(['admin'])->name('update-forfait');

Route::post('/update-forfait', [ForfaitController::class, 'storeForfait'])->middleware(['admin'])->name('storeForfait');

Route::get('/delete-forfait/{forfait_id}', [ForfaitController::class, 'deleteForfait'])->middleware(['admin'])->name('deleteForfait');

/* ----- ESPACE UTILISATEUR ----- */ 

Route::get('/mes-seances', [UserController::class, 'listUserSeances'])->middleware(['user'])->name('mes-seances');

Route::get('/delete-ma-seance/{seance_id}', [UserController::class, 'deleteUserSeances'])->middleware(['user'])->name('delete-user-seance');

/* ----- ESPACE COMMUN -----*/

// Route::get('/details-film/{film_id}', function () {
//     return view('film-seances');
// })->name('film-seance');

Route::get('/details-film/{film_id}', [AllController::class, 'getFilmInfos'])->name('film-seance');

Route::post('/reserver', [AllController::class, 'reserverSeance'])->middleware(['auth'])->name('reserver-seance');

Route::get('/offres-chargements', [AllController::class, 'getChargements'])->name('offres-chargements');

Route::get('/films', [FilmController::class, "index"])
    ->middleware(['auth'])->name('films');

Route::get('/ajout-film', [FilmController::class, "form"]);

Route::post('/ajout-film', [FilmController::class, "save"])
    ->middleware(['auth'])->name('ajout-film');



require __DIR__.'/auth.php';

