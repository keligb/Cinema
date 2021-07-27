<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Films;
use App\Models\Distributeur;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
class FilmController extends Controller{
    
    public function getAffiche(){
        $affiche_film = Films::paginate(10);

        return view('welcome', ['affiche_film' => $affiche_film]);
    }

    public function index(){
        $films = Films::paginate(25);
        return view('films', ['films' => $films]);
    }

    public function show(Request $request){
        $id_film = $request->id_film;
        $film = Films::find($id_film);
        return view('film', ['film' => $film]);
    }

    public function form() {
        $genres = Genre::all();
        return view('add_film', ['genres'=> $genres]);
    }

    public function save(Request $request)
    {
        $film = new Films;
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
                    'image' => 'mimes:jpeg,png,jpg|max:1014',
                ]);
                $extension = $request->image->extension();
                $request->image->storeAs('/public/img', $validated['name'].".".$extension);

                $film->url_img = $validated['name'].".".$extension;
            }
        } else {
            Session::flash('error', "L'image n'a pas pu être téléchargée !");
            return \Redirect::back();
        }

        $film->save();
        Session::flash('success', "Le film a bien été ajouté !");
        return \Redirect::back();

    }

    public function listFilms() {
        $film_list = Films::paginate(5);
        return view('display_films', ['film_list' => $film_list]);
    }

    public function updateView(Request $request) {
        $genres = Genre::all();
        $films = Films::all();

        $id_film = $request->id_film;
        $film_to_update = Films::find($id_film);
        
        $nom_img_exploded = (explode("/", $film_to_update->url_img));
        $nom_img = end($nom_img_exploded);
        return view('update_films', compact('genres', 'film_to_update', 'nom_img' ));
    }

    public function updateFilm(Request $request) {
        $film_list = Films::all();
        $genres = Genre::all();

        $id_film = $request->id_film;      
        $film = Films::find($id_film);

        $film->titre =  $request->titre;
        $film->resum = $request->resume;
    
        // Ajout de l'image si aucune dans BDD et validation
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $validated = $request->validate([
                    'name' => 'string|max:40',
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);
                $extension = $request->image->extension();
                $request->image->storeAs('/public/img', $validated['name'].".".$extension);

                $film->url_img = $validated['name'].".".$extension;

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
            
            $film->id_genre = $request->genre;
            $film->date_debut_affiche = $request->start_date_display;
            $film->date_fin_affiche = $request->end_date_display;
            $film->duree_minutes = $request->duration;
            $film->annee_production = $request->production_year;
            
            $film->save();
            
            Session::flash('success','Le film a bien été mis à jour!');
            return \Redirect::back();
            }
            
        } else if ($film->url_img != "") {
            
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
            
            $film->id_genre = $request->genre;
            $film->date_debut_affiche = $request->start_date_display;
            $film->date_fin_affiche = $request->end_date_display;
            $film->duree_minutes = $request->duration;
            $film->annee_production = $request->production_year;
            
            $film->save();
            
            Session::flash('success','Le film a bien été mis à jour!');
            return \Redirect::back();
        }
        else {
            Session::flash('error', "Veuillez choisir une image !");
            return \Redirect::back();
        }
    }

    public function delete(Request $request)
    {
        $id_film = $request->id_film;

        $film = Films::find($id_film);
        $film->delete();

        return redirect('display-films')->with('status', 'Le film a bien été supprimé !');
        
    }
}
