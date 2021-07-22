<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forfait;

class ForfaitController extends Controller{

    public function saveForfait(){

        $nom_forfait = request('nom-forfait');
        $modalites_forfait = request('modalites-forfait');
        $prix_forfait = request('prix-forfait');

        $forfaitObj = new Forfait();

        // $forfaitObj->forfait_id = Auth::id();
        $forfaitObj->nom = $nom_forfait;
        $forfaitObj->modalites = $modalites_forfait;
        $forfaitObj->prix = $prix_forfait;

        $forfaitObj->save();

        // return view('form-forfaits');
        return redirect('/add-forfait')->with('status', 'Forfait créé !');
    }

    public function displayView(){
        return view('form-forfaits');
    }

    public function listForfaits(){
        $forfait_list = Forfait::paginate(5);

        return view('display-forfaits', ['forfait_list' => $forfait_list]);
    }

    public function updateForfait(Request $request){
        $forfait_id = $request->forfait_id;
        $forfait = Forfait::find($forfait_id);

        return view('update-forfaits', ['forfait' => $forfait]);
    }

    public function storeForfait(Request $request){
        
        $forfait_id = $request->id;
        $forfait = Forfait::find($forfait_id);
        

        $forfait->id_forfait = $request->id;
        $forfait->nom = $request->nomForfait;
        $forfait->modalites = $request->modalitesForfait;
        $forfait->prix = $request->prixForfait;
        $forfait->save();

        return redirect('/display-forfaits')->with('status', 'Forfait modifié !');
        // echo $seance;
    }

    public function deleteForfait(Request $request){
        $forfait_id = $request->forfait_id;
        $forfait = Forfait::find($forfait_id);
        $forfait->delete();

        return redirect('/display-forfaits')->with('status', 'Forfait supprimé !');
    }
}