@include('layouts.app')

<div class="container">
    <h1>Utilisateur {{ $user->name }} :</h1>

    <ul>
        <li>
            Statut admin : 

            @if($user->admin == "1")
                Oui
            @elseif($user->admin == "0")
                Non
            @endif
        </li>

        <li>Adresse mail : {{ $user->email }}</li>

        <li>Numéro de téléphone : {{ $user->phone_number }}</li>
    </ul>
</div>