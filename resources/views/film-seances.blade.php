<!DOCTYPE html>
<html>

    <head>
        <title>Réserver une séance</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ url('/css/seance.css') }}">
        <link rel="stylesheet" href="{{ url('/css/welcome.css') }}">
        <link rel="stylesheet" href="{{ url('/css/forfait.css') }}">
        <link rel="stylesheet" href="{{ url('/css/details-films.css') }}">
        <link rel="stylesheet" href="{{ url('/css/modal.css') }}">
        <link rel="stylesheet" href="{{ url('/css/formulaires.css') }}">
        <script src="{{ url('/css/bootstrap-4/js/jquery.js') }}"></script>
        
        
    </head>

    <body>
        <div class="flex-header-details">
            <a href="/home"><img  class="accueil" src="{{ asset('storage/img/accueil.png') }}"/></a>
            <h1 class="titre-film font-style-titre">{{ $info_list->titre }}</h1>
        </div>

        <div class="container-tab">

            <!-- <img src="{{ $info_list->url_img }}" class="affiche-film-details"> -->
            <img src="{{ asset('storage/img/'.$info_list->url_img) }}" class="affiche-film-details" />

            <!-- <h3>Résumé :</h3> -->

            <div class="resum-tab">
                <p>{{ $info_list->resum }}</p>
            
                <!-- @if(!isset($seance_film))
                    <p>Aucune séance n'a été programmée pour ce film</p>
                @else -->

                    <table  style="width: 100vh; margin-top: 12vh;">
                        <thead>
                                <tr>
                                    <th colspan="4">Séances programmées</th>
                                </tr>
                        </thead>
                            <tbody>
                                <tr class="title-table">
                                    <td>Date</td>
                                    <td>Heure</td>
                                    <td>Salle</td>
                                    <td>Réserver</td>
                                </tr>

                                
                

                                @foreach($seance_film as $seance)
                                    @if ($info_list->id_film == $seance->id_film)
                                        <tr>
                                            <td>{{ $seance->date_seance }}</td>
                                            <td>{{ $seance->heure_debut }}</td>
                                            <td>{{ $seance->id_salle }}</td>
                                            <!-- <td><button type="button" class="btn btn-primary">Réserver</button></td> -->
                                            <td><a href="#modal{{ $seance->id }}" class="js-modal">Réserver</a></td>
                                            <!-- <form action="/reserver" method="post"> -->

                                                {{ csrf_field() }}

                                                <!-- <input type="hidden" name="id_seance" value="{{ $seance->id }}">
                                                <input type="hidden" name="id_user" value="{{ Auth::id() }}"> -->
                                                <!-- <td><input type="submit" value="Réserver" class="button-reserver"></td> -->
                                            <!-- </form> -->
                                        </tr>

                                    @endif

                                @endforeach
                                

                            </tbody>
                    </table>
                <!-- @endif -->
            </div>  
        


        </div>
                @foreach ($seance_film as $seance)
                    @if ($info_list->id_film == $seance->id_film)
                        <div class="modal" id="modal{{ $seance->id }}" aria-hidden="true"  role="dialog" aria-labelledby="modal-title" style="display:none;">
                            <div class="modal-wrapper js-modal-stop">
                                <div class="modal-content">
                                    <!-- <div class="modal-header"> -->
                                        <h2 class="modale-title">Plus d'informations</h2>
                                    <!-- </div> -->
                                    <!-- <div class="modal-body"> -->
                                        <!-- <form action="/reserver" method="post"> -->
                                        {!! Form::open(['route' => 'reserver-seance']) !!}
                                            {{ csrf_field() }}

                                            <x-label for="select-tarif">Choisissez un tarif</x-label>
                                            <select name="select-tarif" required>
                                                <!-- <option>-- Choisissez une option --</option> -->
                                                @foreach ($forfait_seance as $forfait)
                                                    <option>{{ $forfait->nom }}</option>
                                                @endforeach
                                            </select>

                                            @foreach($forfait_seance as $forfait)
                                                <p class="info-forfait">{{ $forfait->nom }} : {{ $forfait->prix }}€</p>
                                            @endforeach

                                            <input type="hidden" name="id_seance" value="{{ $seance->id }}">
                                            <input type="hidden" name="id_user" value="{{ Auth::id() }}">

                                            <!-- <button type="button" class="btn-modale btn1 js-modal-close">Fermer</button>
                                            <button type="submit" class="btn-modale ">Valider</button> -->
                                            
                                            <x-button class="btn-modale btn1 js-modal-close">
                                                {{ __('Annuler') }}
                                            </x-button>
                                            <x-button class="btn-modale">
                                                {{ __('Enregistrer') }}
                                            </x-button>
                                            

                                        {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    @endif

                @endforeach
                

                <script>

                    let modal = null

                    const openModal = function (e) {
                        e.preventDefault()
                        const target = document.querySelector(e.target.getAttribute('href'))
                        target.style.display = null
                        target.removeAttribute('aria-hidden')
                        target.setAttribute('aria-modal', 'true')
                        modal = target
                        modal.addEventListener('click', closeModal)
                        modal.querySelector('.js-modal-close').addEventListener('click', closeModal)
                        modal.querySelector('.js-modal-stop').addEventListener('click', stopPropagation)
                    }

                    const closeModal = function (e) {
                        if (modal === null) return
                        e.preventDefault()
                        modal.style.display = "none"
                        modal.setAttribute('aria-hidden', 'true')
                        modal.removeAttribute('aria-modal')
                        modal.removeEventListener('click', closeModal)
                        modal.querySelector('.js-modal-close').removeEventListener('click', closeModal)
                        modal.querySelector('.js-modal-stop').removeEventListener('click', stopPropagation)
                        modal = null
                    }

                    const stopPropagation = function (e) {
                        e.stopPropagation()
                    }


                    document.querySelectorAll('.js-modal').forEach( a => {
                        a.addEventListener('click', openModal)
                    })

                </script>
                    
                   

    </body>
</html>



