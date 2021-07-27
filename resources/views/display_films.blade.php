<x-app-layout>
    <link rel="stylesheet" href="{{ url('/css/seance.css') }}">
    <link rel="stylesheet" href="{{ url('/css/forfait.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gérer les films') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @extends('components.master')
            @component('components.success')
            @endcomponent
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 tab">
                    <div class="add-forfait">
                        <div class="img-pen">
                            <img src="../../../plus.png" class="pen-edit">
                        </div>
                        <div>
                            <a href="/ajout-film" class="add-forfait-link">Ajouter un film</a>
                        </div>
                   </div>
                   
                    <table>
                        <thead>
                            <tr>
                                <th colspan="12" style="text-align: center;">Films</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="title-table">
                                <td>Film</td>
                                <td>Résumé</td>
                                <td>Date de début d'affiche</td>
                                <td>Date de fin d'affiche</td>
                                <td>Durée en minutes</td>
                                <td>Année de production</td>
                                <td>Genre</td>
                                <td>Distributeur</td>
                                <td>URL de l'image</td>
                                <td>Modifier le film</td>
                                <td>Supprimer le film</td>
                            </tr>
                            
                            @foreach($film_list as $film)
                                <tr>
                                    <td>{{ $film->titre }}</td>
                                    <td>{{ $film->resum }}</td>
                                    <td>{{ $film->date_debut_affiche }}</td>
                                    <td>{{ $film->date_fin_affiche }}</td>
                                    <td>{{ $film->duree_minutes }}</td>
                                    <td>{{ $film->annee_production }}</td>
                                    <td>{{ $film->genre->nom }}</td>
                                    <td>{{ $film->distributeur->nom }}</td>
                                    <td><img src="{{ asset('storage/img/'.$film->url_img) }}" class="affiche-film" /></td>
                                    <td><a href="/update-film/{{ $film->id_film }}"><img src="../../../pen-edit.svg" class="pen-edit"></a></td>
                                    <td><a href="/delete-film/{{ $film->id_film }}">&#128465;</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br />
                    {{ $film_list->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>