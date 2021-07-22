<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{ url('/css/formulaires.css') }}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Programmer une séance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @extends('components.master')
            @component('components.success')
            @endcomponent
            
            <div class="card-update bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" card-contenu p-6 bg-white border-b border-gray-200">
                    <p>Remplissez le formulaire ci-dessous pour ajouter une séance :</p>

                    <!-- <form action="/update-forfait" method="post"> -->
                    {!! Form::open(['route' => 'storeForfait']) !!}
                    
                        {{ csrf_field() }}
                        
                        <div class="form-update">
                            <x-input type="text" name="nomForfait" placeholer="Nom"  value="{{ $forfait->nom }}" required/> 
                        </div>
                        <div class="form-update">
                            <textarea name="modalitesForfait" placeholder="Modalités" required>{{ $forfait->modalites }}</textarea>
                        </div>
                        <div class="form-update">
                            <x-input type="number" name="prixForfait" placeholder="Prix" step="any"  value="{{ $forfait->prix }}" required/>
                            <!-- <x-label for="prix-forfait">€</x-label> -->
                        </div>
                        

                        <div class="update-button">
                            <x-input type="hidden" name="id" value="{{ $forfait->id_forfait }}" />
                            <!-- <x-input type="submit" value="Enregistrer" /> -->
                            <x-button class="update-button">
                                {{ __('Enregistrer') }}
                            </x-button>
                        </div>
                    {{ Form::close() }}

                        

                    <!-- </form> -->
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
