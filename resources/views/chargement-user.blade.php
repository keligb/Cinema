<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Chargements</title>
        <link rel="stylesheet" href="{{ url('/css/seance.css') }}">
        <link rel="stylesheet" href="{{ url('/css/welcome.css') }}">
        <link rel="stylesheet" href="{{ url('/css/forfait.css') }}">
        <link rel="stylesheet" href="{{ url('/css/details-films.css') }}">
        <link rel="stylesheet" href="{{ url('/css/modal.css') }}">
        <link rel="stylesheet" href="{{ url('/css/formulaires.css') }}">
        <link rel="stylesheet" href="{{ url('/css/chargement.css') }}">
    </head>

    <body class="anthialiased">

        @extends('components.master')
        @component('components.success')
        @endcomponent
        
        <div class="flex-header-offre">
                <a href="/home"><img  class="accueil" src="storage/img/accueil.png"/></a>
        </div>

        <h1 class="titre-offre-chargement font-style-titre">Offres de chargement</h1>

        <div class="container-chargement">
            @foreach ($offre_chargement as $offre)
                
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="card-offre-chargement-propose bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <h2 class="nom-chargement-propose">{{ $offre->nom_chargement }}</h2>
                            <div class="card-contenu p-6 bg-white border-b border-gray-200">
                                <ul>
                                    <li>Prix : {{ $offre->prix }}€ / place</li>
                                </ul>
                                <p class="modalite"><em>Modalités : non remboursable</em></p>
                            </div>
                            {!! Form::open(['route' => 'paiement-chargement']) !!}
                                {{ csrf_field() }}

                                <x-input type="hidden" name="id_user_connected" value="{{ Auth::id() }}"/>
                                <x-input type="hidden" name="idChargement" value="{{ $offre->id_chargement }}"/>
                                <x-button class="bouton-valider-chargement">
                                    {{ __('Choisir') }}
                                </x-button>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            
            @endforeach
        </div>
    </body>
</html>