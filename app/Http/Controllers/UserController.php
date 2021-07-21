<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $chargement = Auth::user();
        // dd($chargement_list_user);
        
        return view('mon-chargement', ['chargement' => $chargement]);
    }
    
    public function profilUser(Request $request){
    
        $user = Auth::user();
         
        return view('profil-user', ['user' => $user]);
    }

    public function updateUser(Request $request){

        $user_id = $request->user_id;
        $user = User::find($user_id);
        $user = Auth::user();

        $user->name = $request->name;
    
        $user->password = Hash::make($request->password);
    
        $user->save();

        return redirect('/profil');
    }

    public function deleteUser(Request $request){
        $user = Auth::user();
        $reservations = $user->reservations;

        foreach ($reservations as $reservation)
        {
            $reservation->delete();
        }

        $user->delete();

        return redirect('/');
    }
}
