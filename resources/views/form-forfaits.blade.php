<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{ url('/css/formulaires.css') }}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un forfait') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @extends('components.master')
            @component('components.success')
            @endcomponent

            <div class="div-formulaire-update-seance bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="titre-update-seance">Remplissez le formulaire ci-dessous pour ajouter un forfait :</p>

                    <!-- <form action="/add-forfait-post" method="post"> -->
                    {!! Form::open(['route' => 'add-forfait-post']) !!}
                    
                        {{ csrf_field() }}
                        <div class="form-update-seance">
                            <x-label for="nom-forfait">Nom</x-label>
                            <x-input type="text" name="nom-forfait" placeholer="Nom" required/> 
                        </div>

                        <div class="form-update-seance">
                            <x-label for="modalites-forfait">Modalités</x-label>
                            <textarea name="modalites-forfait" placeholder="Modalités" required></textarea>
                        </div>

                        <div class="form-update-seance">
                            <x-label for="prix-forfait">Prix</x-label>
                            <x-input type="number" name="prix-forfait" placeholder="Prix" step="any" required/>
                            <x-label for="prix-forfait">€</x-label>
                        </div>

                        <div class="update-button-seance">
                            <x-button class="update-button">
                                {{ __('Enregistrer') }} 
                            </x-button>
                            <!-- <x-input type="submit" value="Enregistrer"/> -->
                        </div>
                    {{ Form::close() }}
                    <!-- </form> -->

                </div>
            </div>

        </div>
    </div>
    <!-- https://codepen.io/arefeh_htmi/pen/mdPYZKJ -->
</x-app-layout>



