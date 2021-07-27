<!DOCTYPE html>
<x-app-layout>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ url('/css/forfait.css') }}">
        <title>Chargement</title>
    </head>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mon chargement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if($chargement->id_chargement == null)
                    
                        <p>Vous n'avez aucun chargement !</p>

                    @else

                        <p class="infos-mon-chargement">Vous avez acheté le chargement "{{ $chargement->list_chargement->nom_chargement }}"</p>
                        
                        <p class="infos-mon-chargement"> Nombre de places pour ce chargement : {{ $chargement->list_chargement->nb_places }}</p>
                        <div class="cadre-modalite-chargement">
                            <p class="modalite-chargement">Modalités pour ce chargement : {{ $chargement->list_chargement->modalite }}</p>
                        </div>
                
                        
                    @endif

                    
                </div>
            </div>
        </div>

   
</x-app-layout>
