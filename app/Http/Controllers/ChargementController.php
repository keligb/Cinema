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

    public function updateChargement() {
        $chargements_list = $request->id_chargement;
        $chargements_list = Post::find($id_chargement);
        return view('updateChargment', ['chargements_list' => $chargements_list]);
    }
}
