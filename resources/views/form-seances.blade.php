<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Programmer une séance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Remplissez le formulaire ci-dessous pour ajouter une séance :</p>

                    <form action="/form-seances" method="post">
                    
                        {{ csrf_field() }}

                        <label for="film-select">Film :</label>
                        <select name="film" id="film-select" required>
                                <option value=""> -- choisissez un film --</option>
                            @foreach ($film_list as $film)
                                <option value="{{ $film->id_film }}">{{ $film->titre }}</option>
                            @endforeach
                        </select>

                        <label for="salle-select">Salle :</label>
                        <select name="salle" id="salle-select" required>
                                <option value=""> -- choisissez une salle --</option>
                            @foreach ($salle_list as $salle)
                                <option value="{{ $salle->id_salle }}">{{ $salle->numero_salle }}</option>
                            @endforeach
                        </select>

                        <label for="date-seance">Date :</label>
                        <input type="date" id="date-seance" name="date" required>

                        <label for="heure-debut">Heure de début :</label>
                        <input type="time" id="heure-debut" name="debut" min="09:00" max="21h00" required>

                        <input type="submit" value="Enregistrer">
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
