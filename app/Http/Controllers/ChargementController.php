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

    // public function addChargement() {
    //     return view('chargements-add');
    //     $nom_chargement = request('nom');
    //     $prix = request('prix');

    //     $chargementObj = new Chargement();

    //     $chargementObj->nom_chargement = $nom_chargement;
    //     $chargementObj->prix = $prix;

    //     $chargementObj->save();

    //     return redirect('/chargements');
    // }

    public function save(Request $request) 
    {
        $chargement = new Chargement;
        $chargement->nom_chargement = $request->nom_chargement;
        $chargement->nb_places = $request->nb_places;
        $chargement->prix = $request->prix;
        $chargement->modalite = $request->modalite;
        $chargement->save(); 

        return redirect('/chargements');
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

        return redirect('/chargements');
    }

    public function deleteChargement(Request $request) 
    {
        $chargement_id = $request->chargement_id;
        $chargement = Chargement::find($chargement_id);
        $chargement->delete();

        return redirect('/chargements')->with('status', 'Chargements deleted !');
    }
}
