<x-app-layout>
    <link rel="stylesheet" href="{{ url('/css/seance.css') }}">
    <link rel="stylesheet" href="{{ url('/css/forfait.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gérer les séances') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @extends('components.master')
            @component('components.success')
            @endcomponent
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 tab">
                    <div class="add-forfait">
                        <div class="img-pen">
                            <img src="../../../plus.png" class="pen-edit">
                        </div>
                        <div>
                            <a href="/form-seances" class="add-forfait-link">Programmer une séance</a>
                        </div>
                   </div>

                    <table>
                        <thead>
                            <tr>
                                <th colspan="7" style="text-align: center;">Séances programmées</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="title-table">
                                <td>Film</td>
                                <td>Salle</td>
                                <td>Date</td>
                                <td>Heure de début</td>
                                <td>Modifier la séance</td>
                                <td>Supprimer la séance</td>
                            </tr>

                            @foreach($seance_list as $seance)
                                <tr>
                                    <td>{{ $seance->film->titre }}</td>
                                    <td>{{ $seance->salle->numero_salle }}</td>
                                    <td>{{ $seance->date_seance }}</td>
                                    <td>{{ $seance->heure_debut }}</td>
                                    <td><a href="/update/{{ $seance->id }}"><img src="../../../pen-edit.svg" class="pen-edit"></a></td>
                                    <td><a href="/delete/{{ $seance->id }}" onclick="return confirm('Êtes vous sûr de vouloir supprimer cette séance ?');">&#128465;</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br />
                    {{ $seance_list->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>