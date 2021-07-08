<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update chargement number #{{ $chargement_list->id_chargement }}
        </h2>
    </x-slot>
    <!-- @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif -->

    <div class="py-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>{{ $chargement_list->nom_chargement }}</h2>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>