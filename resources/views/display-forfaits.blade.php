<x-app-layout>
    <link rel="stylesheet" href="{{ url('/css/seance.css') }}">
    <link rel="stylesheet" href="{{ url('/css/forfait.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gérer les forfaits') }}
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
                            <a href="/add-forfait" class="add-forfait-link">Ajouter un forfait</a>
                        </div>
                   </div>

                    <table>
                        <thead>
                            <tr>
                                <th colspan="5">Forfaits proposés</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="title-table">
                                <td>Forfait</td>
                                <td>Modalités</td>
                                <td>Prix</td>
                                <td>Modifier</td>
                                <td>Supprimer</td>
                            </tr>

                            @foreach($forfait_list as $forfait)
                                <tr>
                                    <td>{{ $forfait->nom }}</td>
                                    <td>{{ $forfait->modalites }}</td>
                                    <td>{{ $forfait->prix }} €</td>
                                    <td><a href="/update-forfait/{{ $forfait->id_forfait }}"><img src="../../../pen-edit.svg" class="pen-edit"></a></td>
                                    <td><a href="/delete-forfait/{{ $forfait->id_forfait }}">&#128465;</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br />
                    {{ $forfait_list->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>