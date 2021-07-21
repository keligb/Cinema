<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ajouter un film
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @extends('components.master')
                @include('components.add_film_form')
                @component('components.success')
                @component('components.error')
                @endcomponent
                @endcomponent
            </div>
        </div>
    </div>
</x-app-layout>
