<x-app-layout>
<link rel="stylesheet" href="{{ url('/css/user.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profil
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card-profil bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="titre-profil">Vos informations</h2>
                <div class="card-contenu p-6 bg-white border-b border-gray-200">
                    {!! Form::open(['route' => 'profilUpdate']) !!}
                        <div class="form-utilisateur">
                            <x-label for="nom-utilisateur" class="info-user">Nom</x-label>
                            <x-input id="nom-utilisateur" type="text" name="name" value="{{ $user->name }}"/>
                        </div>
                        <div class="form-utilisateur">
                            <x-label for="email-utilisateur" class="info-user">Adresse email</x-label>
                            <x-input id="email-utilisateur" type="text" name="email" value="{{ $user->email }}" disabled/>
                        </div>
                        <div class="form-utilisateur">
                            <x-label for="mdp-utilisateur" class="info-user">Mot de passe</x-label>
                            <x-input id="mdp-utilisateur" type="password" name="password" value="{{ $user->password }}"/>
                        </div>
                        <x-input type="hidden" value="{{ $user->id }}" />
                        <x-button class="profil-button">
                                {{ __('Enregistrer') }}
                        </x-button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    @if (Auth::user() && Auth::user()->role == "user")
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card-suppression bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="titre-suppression">Supprimer votre compte</h2>
                <div class="card-contenu p-6 bg-white border-b border-gray-200">
                    <p class="warning-suppression">Attention, cette action est irréversible !</p>
                    <x-button class="delete-user-account">
                        
                        <a href="/profil-delete">
                        {{ __('Supprimer mon compte') }}
                        </a>
                    </x-button>
                </div>
            </div>
        </div>
    </div>
    @endif
    

</x-app-layout>