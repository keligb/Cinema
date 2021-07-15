<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mettre à jour le chargement #{{ $chargement->nom_chargement }}
        </h2>
    </x-slot>

    <div class="py-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {!! Form::open(['route' => 'saveChargement']) !!}
                        {!! Form::label('Nom du chargement :') !!}
                        {!! Form::text('nom_chargement', $chargement->nom_chargement) !!}
                        {!! Form::label('Prix :') !!}
                        {!! Form::number('prix', $chargement->prix) !!}
                        {!! Form::hidden('chargement_id', $chargement->id_chargement) !!}
                        {!! Form::submit('Enregistrer') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>