<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="">
        <title>Chargement</title>
    </head>

    <body>
        <h1>Etat de votre chargement</h1>

        <p>{{ $chargement_list_user }}</p>

        <p>{{ $chargement_list_user->list_chargement->nom_chargement }}</p>
        <p>{{ $chargement_list_user->list_chargement->nb_places }}</p>
    </body>
</html>