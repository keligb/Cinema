<x-app-layout>
    <link rel="stylesheet" href="{{ url('/css/seance.css') }}">
    <link rel="stylesheet" href="{{ url('/css/forfait.css') }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes séances réservées') }}
        </h2>
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif 

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
                               @if ($seance->list_user->id == Auth::id())
                                <tr>
                                    <td>{{ $seance->list_data->film->titre }}</td>
                                    <td>{{ $seance->list_data->heure_debut }}</td>
                                    <td>{{ $seance->list_data->date_seance }} </td>
                                    <td>{{ $seance->list_data->id_salle }}</td>
                                    <!-- <td>{{ $seance->id }}</td> -->
                                    <td><a href="/delete-ma-seance/{{ $seance->id }}">&#128465;</a></td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>

<!-- if $seance->list_user->id == Auth::id()" (id de l'utilisateur connecté) -->