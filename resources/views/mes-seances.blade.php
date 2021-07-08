<x-app-layout>
    <link rel="stylesheet" href="{{ url('/css/seance.css') }}">
    <link rel="stylesheet" href="{{ url('/css/forfait.css') }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes séances réservées') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table>
                        <thead>
                            <tr>
                                <th colspan="5">Mes séances</th>
                            </tr>
                        <thead>

                        <tbody>
                            <tr class="title-table">
                                <td>Film</td>
                                <td>Horaire</td>
                                <td>Date</td>
                                <td>Salle</td>
                                <td>Annuler la réservation</td>
                            </tr>
                            @foreach($seance_list as $seance)
                                <tr>
                                    <td>{{ $seance->film->titre }}</td>
                                    <td>{{ $seance->heure_debut }}</td>
                                    <td>{{ $seance->date_seance }}</td>
                                    <td>{{ $seance->salle->numero_salle }}</td>
                                    <td>&#128465;</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
