<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chargement;

class ChargementController extends Controller
{
    public function display() {
        $chargements_list = Chargement::all();
        return view('chargements', ['chargements_list' => $chargements_list]);
    }

    public function save(Request $request) 
    {
        $chargement = new Chargement;
        $chargement->nom_chargement = $request->nom_chargement;
        $chargement->nb_places = $request->nb_places;
        $chargement->prix = $request->prix;
        $chargement->modalite = $request->modalite;
        $chargement->save(); 

        return redirect('/chargements')->with('status', 'Votre chargement a été ajouté !');
    }

    public function updateChargement(Request $request) 
    {
        $chargement_id = $request->chargement_id;
        $chargement = Chargement::find($chargement_id);
        return view('chargements-update', ['chargement' => $chargement]);
    }

    public function saveChargement(Request $request) 
    {
        $chargement_id = $request->chargement_id;
        $chargement = Chargement::find($chargement_id);

        $chargement->nom_chargement = $request->nom_chargement;
        $chargement->nb_places = $request->nb_places;
        $chargement->prix = $request->prix;
        $chargement->modalite = $request->modalite;
        $chargement->save();

        return redirect('/chargements')->with('status', 'Votre chargement a été modifié !');
    }

    public function deleteChargement(Request $request) 
    {
        $chargement_id = $request->chargement_id;
        $chargement = Chargement::find($chargement_id);
        $chargement->delete();

        return redirect('/chargements')->with('status', 'Votre chargement a été supprimé !');
    }
}
