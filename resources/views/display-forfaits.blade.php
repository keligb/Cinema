<x-app-layout>
    <link rel="stylesheet" href="{{ url('/css/seance.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gérer les forfaits') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 tab">
                    <!-- <h1>Forfaits proposés</h1> -->
                    <table>
                        <tbody>
                            <tr>
                                <td>Nom</td>
                                <td>Modalités</td>
                                <td>Prix</td>
                                <td>Modifier</td>
                                <td>Supprimer</td>
                            </tr>

                            @foreach($forfait_list as $forfait)
                                <tr>
                                    <td>{{ $forfait->nom }}</td>
                                    <td>{{ $forfait->modalites }}</td>
                                    <td>{{ $forfait->prix }}</td>
                                    <td><a href="/update-forfait/{{ $forfait->id_forfait }}">Modifier</a></td>
                                    <td><a href="/delete-forfait/{{ $forfait->id_forfait }}">Supprimer</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>