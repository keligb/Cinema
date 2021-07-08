<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\ChargementController;

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
})->middleware(['admin'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard-user');
// })->middleware(['user'])->name('dashboard');

Route::get('/form-seances', [SeanceController::class, 'listData'])->middleware(['admin'])->name('form-seances');

Route::post('/form-seances', [SeanceController::class, 'saveSeance'])->middleware(['admin'])->name('form-seances');

Route::get('/display-seances', [SeanceController::class, 'listSeance'])->middleware(['admin'])->name('display-seances');

Route::get('/delete/{seance_id}', [SeanceController::class, 'deleteSeance'])->middleware(['admin'])->name('delete');

Route::get('/update/{seance_id}', [SeanceController::class, 'updateSeance'])->middleware(['admin'])->name('update');

Route::post('/update', [SeanceController::class, 'storeSeance'])->middleware(['admin'])->name('store');

Route::get('/chargements', [ChargementController::class, 'display'])->middleware(['admin'])->name('chargements');

Route::post('/update-chargement', [ChargementController::class, 'updateChargement'])->middleware(['admin'])->name('updateChargement');

require __DIR__.'/auth.php';

