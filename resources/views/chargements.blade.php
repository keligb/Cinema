<x-app-layout>
    <link rel="stylesheet" href="{{ url('/css/chargement.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chargements proposés') }}
        </h2>
    </x-slot>
    <div class="container-chargement">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                @extends('components.master')
                @component('components.success')
                @endcomponent

                <div class="card-chargement bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <p class="titre-card-chargement">Ajouter un chargement</p>
                    <div class="card-contenu p-6 bg-white border-b border-gray-200">
                        {!! Form::open(['route' => 'addChargement']) !!}
                            @csrf
                        <div class="form-chargement">
                            <x-label for="nom-chargement" class="info-chargement">Nom du chargement</x-label>
                            <x-input id="nom-chargement" type="text" name="nom_chargement" />
                        </div>
                        <div class="form-chargement">
                            <x-label for="places-chargement" class="info-chargement">Nombre de places</x-label>
                            <x-input id="places-chargement" type="number" name="nb_places" />
                        </div>
                        <div class="form-chargement">
                            <x-label for="prix-chargement" class="info-chargement">Prix /place</x-label>
                            <x-input id="prix-chargement" type="number" name="prix" step="any"/>
                        </div>
                        <div class="form-chargement">
                            <x-label for="modalite-chargement" class="info-chargement">Modalités</x-label>
                            <x-input id="modalite-chargement" type="text" name="modalite" />
                        </div>
                        <div class="form-chargement">
                            <x-button>
                                    {{ __('Enregistrer') }}
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($chargements_list as $chargement)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="card-chargement-propose bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <h2 class="nom-chargement-propose">{{ $chargement->nom_chargement }}</h2>
                        <div class="card-contenu p-6 bg-white border-b border-gray-200">
                            <ul>
                                <li>Nombre de places : {{ $chargement->nb_places }}
                                <li>Prix : {{ $chargement->prix }}€ / place</li>
                            </ul>
                            <p class="modalite"><em>{{ $chargement->modalite }}</em></p>
                        </div>
                        <div class="button-card-chargement">
                            <button class="btn-edit-chargement"><a href="/update-chargement/{{ $chargement->id_chargement }}">Modifier</a></button>
                            <button class="btn-edit-suppression"><a href="/delete-chargement/{{ $chargement->id_chargement }}" onclick="return confirm('Êtes vous sûr de vouloir supprimer ce chargement ?');">Supprimer</a></button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>