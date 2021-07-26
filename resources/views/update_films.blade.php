<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier un film
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @extends('components.master')
                <div class="container-fluid">
                {!! Form::open(['route' => 'update_film', 'enctype' => 'multipart/form-data']) !!}
                    <div style="display: flex; justify-content: space-around; align-items: center; padding: 20px;">
                        @csrf
                        <div>
                            <img src="{{ $film_to_update->url_img }}" style="border-radius: 7px; height: 400px;">
                            <div class="form-group" style = "margin-top: 20px; width: 59%;">
                                <input type="text" class="form-control" id="name" placeholder="Entrer le nom de l'image" value ="{{ $nom_img }}" name="name" required="required">
                            </div>
                            <div class="form-group">
                                <label for="image">Choisir une image</label>
                                <input id="image" type="file" name="image">
                            </div>
                        </div>
                        <div style = "width: 40%;">
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" class="form-control" id="titre" value="{{ $film_to_update->titre }}" name="titre" required="required">
                            </div>
                            <div class="form-group">
                                <label for="resume">Résumé</label>
                                <textarea class="form-control" id="resume" name="resume" required="required">{{ $film_to_update->resum }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="director">Producteur</label>
                                <input type="text" class="form-control" id="director" value="{{ $film_to_update->distributeur->nom }}" required="required" name="director">
                            </div>
                            <div class="form-group">
                                <label for="genre">Genre</labeL>
                                <select class="form-control" name="genre" id="genre" value="{{ $film_to_update->genre->nom }}">
                                    
                                    @foreach($genres as $genre)
                                        <option value={{$genre->id_genre}}>{{$genre->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start-date-display">Date de début d'affiche</labeL>
                                <input type="date" class="form-control" id="start_date_display"  value="{{ $film_to_update->date_debut_affiche }}" name="start_date_display" min="20/" required="required" min="">
                            </div>
                            <div class="form-group">
                                <label for="end-date-display">Date de fin d'affiche</labeL>
                                <input type="date" class="form-control" id="end_date_display"  value="{{ $film_to_update->date_fin_affiche }}" name="end_date_display" required="required">
                            </div>
                            <div class="form-group">
                                <label for="duration">Durée du film en minutes</label>
                                <input type="number" class="form-control" id="duration"  value="{{ $film_to_update->duree_minutes }}" name="duration" min="20" max="210">
                            </div>
                            <div class="form-group">
                                <label for="production_year">Année de production</label>
                                <input type="number" class="form-control" id="production_year"  value="{{ $film_to_update->annee_production }}" name="production_year" min="1895" max="2022">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" value="{{ $film_to_update->id_film }}" name="id_film">
                            </div>
                            <button type="submit" class="btn btn-dark d-block w-75 mx-auto">Modifier le film</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>           
    </div>
                @include('components.errors')
                @component('components.success')
                @endcomponent
                @component('components.error')
                @endcomponent
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript" src="{{ URL::asset('js/add_film.js') }}"></script>