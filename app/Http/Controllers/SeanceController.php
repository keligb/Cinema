<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Films;
use App\Models\Salles;
use App\Models\Seances;

class SeanceController extends Controller{

    // public function infoSeance(Request $request){
    //     $seance_id = $request->seance_id;
    //     $seance = Seances::find($seance_id);
    //     return view('form-seances', ['seance' => $seance]);
    // }

    public function listData(){
        $film_list = Films::all();
        $salle_list = Salles::all();
        return view('form-seances', ['film_list' => $film_list, "salle_list"=>$salle_list]);
    }

    public function saveSeance(){

        $titre_film = request('film');
        $num_salle = request('salle');
        $date_seance = request('date');
        $heure_debut = request('debut');

        $seanceObj = new Seances();

        $seanceObj->id_film = $titre_film;
        $seanceObj->id_salle = $num_salle;
        $seanceObj->date_seance = $date_seance;
        $seanceObj->heure_debut = $heure_debut;

        $seanceObj->save();
    }
}