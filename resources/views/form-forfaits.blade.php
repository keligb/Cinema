<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un forfait') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Remplissez le formulaire ci-dessous pour ajouter un forfait :</p>

                    <form action="/add-forfait-post" method="post">
                    
                        {{ csrf_field() }}

                        <input type="text" name="nom-forfait" placeholer="Nom" required> 
                        <textarea name="modalites-forfait" placeholder="Modalités" required></textarea>
                        <input type="number" name="prix-forfait" placeholder="Prix" step="any" required>
                        <label for="prix-forfait">€</label>
                        
                        <input type="submit" value="Enregistrer">
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
