<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ajouter un chargement
        </h2>
    </x-slot>

    <div class="py-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {!! Form::open(['route' => 'addChargement']) !!}
                        {!! Form::label('Nom du chargement :') !!}
                        {!! Form::text('nom_chargement') !!}
                        {!! Form::label('Prix :') !!}
                        {!! Form::number('prix') !!}
                        {!! Form::submit('Enregistrer') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>