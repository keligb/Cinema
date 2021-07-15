<!DOCTYPE html>
<html>

    <head>
        <title>Réserver une séance</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ url('/css/seance.css') }}">
        <link rel="stylesheet" href="{{ url('/css/welcome.css') }}">
        <link rel="stylesheet" href="{{ url('/css/forfait.css') }}">
    </head>

    <body>
        <img src="{{ $info_list->url_img }}" class="affiche-film">

        <p>{{ $info_list->resum }}</p>
        <!-- <p>{{ $info_list->id_film }}</p> -->

       <table>
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
                            <form action="/reserver" method="post">

                                {{ csrf_field() }}

                                <input type="hidden" name="id_seance" value="{{ $seance->id }}">
                                <input type="hidden" name="id_user" value="{{ Auth::id() }}">
                                <td><input type="submit" value="Réserver"></td>
                            </form>
                        </tr>
                    @endif

                @endforeach

            </tbody>
        </table>


    </body>
</html>



