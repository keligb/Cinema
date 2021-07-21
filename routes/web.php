<?php

use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;

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

Route::get('/films', [FilmController::class, "index"])
    ->middleware(['auth'])->name('films');

Route::get('/ajout-film', [FilmController::class, "form"]);

Route::post('/ajout-film', [FilmController::class, "save"])
    ->middleware(['auth'])->name('ajout-film');



require __DIR__.'/auth.php';
