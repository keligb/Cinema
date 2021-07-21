<?php

namespace App\Http\Controllers;

use App\Models\Distributeur;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class FilmController extends Controller
{
    public function getAffiche(){
        $affiche_film = Films::paginate(8);

        return view('welcome', ['affiche_film' => $affiche_film]);
    }
    
    public function index(){
        $films = Film::paginate(25);
        return view('films', ['films' => $films]);
    }

    public function show(Request $request){
        $id_film = $request->id_film;
        $film = Film::find($id_film);
        return view('film', ['film' => $film]);
    }

    public function form() {
        $genres = Genre::all();
        return view('add_film', ['genres'=> $genres]);
    }

    public function save(Request $request)
    {
        $film = new Film;
        $film->titre = $request->titre;
        $film->resum = $request->resume;
        $film->date_debut_affiche = $request->start_date_display;
        $film->date_fin_affiche = $request->end_date_display;
        $film->duree_minutes = $request->duration;
        $film->annee_production = $request->production_year;
        $film->id_genre = $request->genre;

        // Ajout distributeur
        if (Distributeur::where('nom', '=', ($request->director))->exists()) {
            $id_distibuteur = DB::table('distributeurs')
                ->select('id_distributeur')
                ->where('nom', '=', ($request->director))
                ->value('id_distributeur');

            $film->id_distributeur = $id_distibuteur;
        } else {
            $id_distibuteur = DB::table('distributeurs')->insertGetId(
                ['nom' => $request->director]
            );
            $film->id_distributeur = $id_distibuteur;
        }

        // Ajout de l'image et validation
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $validated = $request->validate([
                    'name' => 'string|max:40',
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);
                $extension = $request->image->extension();
                $request->image->storeAs('/public/img', $validated['name'].".".$extension);
                //$url = "http://localhost/Cinema/storage/app/public/".$validated['name'].".".$extension;
                $url = Storage::url("app/public/img/".$validated['name'].".".$extension);
                $film->url_img = $url;
            }
        } else {
            Session::flash('error', "L'image n'a pas pu être téléchargée !");
            return \Redirect::back();
        }

        $film->save();
        Session::flash('success', "Le film a bien été ajouté !");
        return \Redirect::back();
    }
}
