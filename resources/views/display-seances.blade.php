<x-app-layout>
    <!-- <link rel="stylesheet" href="../css/app.css"> -->
    <!-- <link rel="stylesheet" href="{{ URL::asset('public/css/seance.css') }}"> -->
    <link rel="stylesheet" href="{{ url('/css/seance.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gérer les séances') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 tab">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="7">Séances programmées</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Film</td>
                                <td>Salle</td>
                                <td>Date</td>
                                <td>Heure de début</td>
                                <td>Heure de fin</td>
                                <td>Modifier la séance</td>
                                <td>Supprimer la séance</td>
                            </tr>

                            @foreach($seance_list as $seance)
                                <tr>
                                    <td>{{ $seance->film->titre }}</td>
                                    <td>{{ $seance->salle->numero_salle }}</td>
                                    <td>{{ $seance->date_seance }}</td>
                                    <td>{{ $seance->heure_debut }}</td>
                                    <td>00:00:00</td>
                                    <td><a href="/update-seances/{{ $seance->id }}">Modifier</a></td>
                                    <td><a href="/delete/{{ $seance->id }}">Supprimer</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>