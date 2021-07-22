<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cinéma</title>
        <link rel="stylesheet" href="{{ url('/css/welcome.css') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    </head>
    
    <body class="antialiased">
        @extends('components.master')
        @component('components.success')
        @endcomponent
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">

                    <a href="{{ url('/offres-chargements') }}" class="text-sm text-gray-700 underline font-style-titre">Offres de chargement</a>

                    @auth
                        @if (Auth::user() && Auth::user()->role == "admin")
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline font-style-titre">Espace Administrateur</a>
                        @else
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline font-style-titre">Espace personnel</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline font-style-titre">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline font-style-titre">Register</a>
                        @endif
                    @endauth
                    
                </div>
            @endif

            

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <img src="../../CGR_logo.png" class="block h-10 w-autofill-current text-gray-600 logo-welcome" />
                    <h1 class="titre-welcome font-style-titre">Bienvenue sur le site de votre cinéma !</h1>
                </div>

                <div class="justify-center container-affiches-films">
                    @foreach($affiche_film as $affiche)
                        <a href="/details-film/{{ $affiche->id_film }}"><img src="{{ asset('storage/img/'.$affiche->url_img) }}" class="affiche-film" /></a>
                    @endforeach
                </div>

                {{ $affiche_film->links() }}

                </div>
                
            </div>
            
        </div>
        
    </body>
</html>

