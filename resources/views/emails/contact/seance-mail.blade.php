@component('mail::message')
# Votre séance a bien été réservée !

Votre séance à bien été réservée, vous pourrez vous servir de ce mail comme billet d'entrée dans le cinéma !

@component('mail::button', ['url' => 'http://cinema.local'])
Retourner sur notre site
@endcomponent

Merci,<br>
CGR Cinema
@endcomponent
