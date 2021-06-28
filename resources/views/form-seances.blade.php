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
                        <select name="film" id="film-select">
                            <option value="Film1">Film1</option>
                            <option value="Film2">Film2</option>
                            <option value="Film3">Film3</option>
                            <option value="Film4">Film4</option>
                        </select>

                        <label for="salle-select">Salle :</label>
                        <select name="salle" id="salle-select">
                            <option value="Salle1">Salle1</option>
                            <option value="Salle2">Salle2</option>
                            <option value="Salle3">Salle3</option>
                            <option value="Salle4">Salle4</option>
                        </select>

                        <label for="date-seance">Date :</label>
                        <input type="date" id="date-seance" name="date">

                        <label for="heure-debut">Heure de début :</label>
                        <input type="time" id="heure-debut" name="debut" min="09:00" max="21h00" required>

                        <input type="submit" value="Enregistrer">
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
