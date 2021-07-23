<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Films;
use App\Models\Salles;
use App\Models\Seances;
use App\Models\user_has_seances;
use App\Models\Forfait;
use App\Models\Chargement;
use App\Models\User;

use Illuminate\Support\Facades\Mail;
use App\Mail\SeanceMail;

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
        $mail_user = Auth::user()->email;
        
        $obj = new user_has_seances();

        $obj->id_seance = $seance_id;
        $obj->id_user = $user_id;
        $obj->save();

        Mail::to($mail_user)->send(new SeanceMail());

        return redirect('/')->with('status', 'Séance réservée ! Un email de confirmation vous a été envoyé !');
        // return view('film-seances');
    }

    public function getChargements(){

        $offre_chargement = Chargement::all();

        return view ('chargement-user', ['offre_chargement' => $offre_chargement]);
    }

    public function payerChargement(Request $request){
        
        $chargement_id  = request('idChargement');
        $id_user = request('id_user_connected');
        
        $obj = User::find($id_user);

        $obj->id_chargement = $chargement_id;
        $obj->save();

        return redirect ('/offres-chargements')->with('status', 'Paiement validé !');
    }

}