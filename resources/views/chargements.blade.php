<x-app-layout>
    <link rel="stylesheet" href="{{ url('/css/chargement.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chargements proposés') }}
        </h2>
    </x-slot>
    <div class="container-chargement">
        @foreach ($chargements_list as $chargement)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="card-chargement bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <h2 class="nom-chargement">{{ $chargement->nom_chargement }}</h2>
                        <div class="card-contenu p-6 bg-white border-b border-gray-200">
                            <ul>
                                <li>Prix : {{ $chargement->prix }}€ / place</li>
                            </ul>
                            <p>Modalités: Utilisation dans les 3 prochains mois<p>
                        </div>
                        <button href="/update-chargement/{{ $chargement->id }}" type="button" class="btn-edit-chargement">Modifier</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>