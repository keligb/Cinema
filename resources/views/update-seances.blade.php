<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{ url('/css/formulaires.css') }}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Programmer une séance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" div-formulaire-update-seance bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="titre-update-seance">Remplissez le formulaire ci-dessous pour ajouter une séance :</p>

                    {!! Form::open(['route' => 'store']) !!}

                    
                        {{ csrf_field() }}
                        <div class="form-update-seance">
                            <x-label for="film-select">Film</x-label>
                            <select name="film" id="film-select" required>
                                    <option value="">{{ $seance->film->titre }}</option>
                                @foreach ($film_list as $film)
                                    <option value="{{ $film->id_film }}">{{ $film->titre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-update-seance">
                            <x-label for="salle-select">Salle</x-label>
                            <select name="salle" id="salle-select" required>
                                    <option value="">{{ $seance->salle->numero_salle }}</option>
                                @foreach ($salle_list as $salle)
                                    <option value="{{ $salle->id_salle }}">{{ $salle->numero_salle }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-update-seance">
                            <x-label for="date-seance">Date</x-label>
                            <x-input type="date" id="date-seance" name="date" required value="{{ $seance->date_seance }}"/>
                        </div>

                        <div class="form-update-seance">
                            <x-label for="heure-debut">Heure de début</x-label>
                            <x-input type="time" id="heure-debut" name="debut" min="09:00" max="22:00" value="{{ $seance->heure_debut }}" required/>
                        </div>
                        
                        <div class="update-button-seance">
                            <input type="hidden" name="id" value="{{ $seance->id }}" />
                            <x-button class="update-button">
                                {{ __('Enregistrer') }}
                            </x-button>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
