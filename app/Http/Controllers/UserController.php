<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seances;
use App\Models\Films;
use App\Models\Salles;
use App\Models\user_has_seances;
// use App\Models\Chargement;

class UserController extends Controller{

    function unefonction(){
        return view('mes-seances');
    }

    function listUserSeances(){
        // $seance_list = Seances::paginate(5);

        $seance_list = user_has_seances::all();

        return view('mes-seances', ['seance_list' => $seance_list]);
    }

    public function deleteUserSeances(Request $request){
        $seance_id = $request->seance_id;
        $seance = user_has_seances::find($seance_id);
        $seance->delete();

        return redirect('/mes-seances')->with('status', 'Réservation annulée !');
    }

    public function getChargementUser(){

        $chargement_list_user = Auth::user();
        // dd($chargement_list_user);
        
        return view('mon-chargement', ['chargement_list_user' => $chargement_list_user]);
    }

}
