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

    public function listSeance(){
        $seance_list = Seances::paginate(5);

        return view('display-seances', ['seance_list' => $seance_list]);
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

        return redirect('/form-seances')->with('status', 'Séance créee !');
    }

    public function deleteSeance(Request $request){

        $seance_id = $request->seance_id;
        $seance = Seances::find($seance_id);
        $seance->delete();

        return redirect('/display-seances')->with('status', 'Séance supprimée !');
    }

    public function updateSeance(Request $request){
        $film_list = Films::all();
        $salle_list = Salles::all();

        $seance_id = $request->seance_id;
        $seance = Seances::find($seance_id);

        return view('update-seances', ['seance' => $seance, 'film_list' => $film_list, "salle_list"=>$salle_list]);
    }

    public function storeSeance(Request $request){
        
        $seance_id = $request->id;
        $seance = Seances::find($seance_id);
        

        $seance->id_film = $request->film;
        $seance->id_salle = $request->salle;
        $seance->date_seance = $request->date;
        $seance->heure_debut = $request->debut;
        $seance->save();

        return redirect('/display-seances')->with('status', 'Séance modifiée !');
        // echo $seance;
    }
}