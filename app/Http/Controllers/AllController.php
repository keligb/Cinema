<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Films;
use App\Models\Salles;
use App\Models\Seances;
use App\Models\user_has_seances;
use App\Models\Forfait;

class AllController extends Controller{

    public function getFilmInfos(Request $request){
        $film_id = $request->film_id;
        $info_list = Films::find($film_id);

        $seance_film = Seances::all();

        $forfait_seance = Forfait::all();



        return view('film-seances', ['info_list' => $info_list, 'seance_film' => $seance_film, 'forfait_seance' => $forfait_seance]);
    }

    public function reserverSeance(Request $request){
        $user_id = request('id_user');
        $seance_id = request('id_seance');
        
        $obj = new user_has_seances();

        $obj->id_seance = $seance_id;
        $obj->id_user = $user_id;
        $obj->save();

        return redirect('/')->with('status', 'Séance réservée !');
        // return view('film-seances');
    }

}