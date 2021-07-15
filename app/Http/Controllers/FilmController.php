<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Films;

class FilmController extends Controller{
    
    public function getAffiche(){
        $affiche_film = Films::paginate(8);

        return view('welcome', ['affiche_film' => $affiche_film]);
    }
}