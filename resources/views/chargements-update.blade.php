<x-app-layout>
    <link rel="stylesheet" href="{{ url('/css/chargement.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mettre à jour le chargement : {{ $chargement->nom_chargement }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card-update-chargement bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card-contenu-update p-6 bg-white border-b border-gray-200">
                    {!! Form::open(['route' => 'saveChargement']) !!}
                        <div class="form-chargement-update">
                            <x-label for="nom-chargement-update" class="info-chargement">Nom du chargement</x-label>
                            <x-input id="nom-chargement-update" type="text" name="nom_chargement" value="{{ $chargement->nom_chargement }}"/>
                        </div>
                        <div class="form-chargement-update">
                            <x-label for="places-chargement-update" class="info-chargement">Nombre de places</x-label>
                            <x-input id="places-chargement-update" type="number" name="nb_places" value="{{ $chargement->nb_places }}"/>
                        </div>
                        <div class="form-chargement-update">
                            <x-label for="prix-chargement-update" class="info-chargement">Prix</x-label>
                            <x-input id="prix-chargement-update" type="number" name="prix" value="{{ $chargement->prix }}"/>
                        </div>
                        <div class="form-chargement-update">
                            <x-label for="modalite-chargement-update" class="info-chargement">Modalités</x-label>
                            <x-input id="modalite-chargement-update" type="text" name="modalite" value="{{ $chargement->modalite }}"/>
                        </div>
                        <x-input type="hidden" name="chargement_id" value="{{ $chargement->id_chargement }}" />
                        <x-button class="update-chargement-button">
                                {{ __('Enregistrer') }}
                        </x-button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>