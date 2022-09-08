@include('layouts.app')

@foreach($productsFound as $prod)
    <div class="container">
        <h2>{{ $prod->title }}</h2>
        <img style="height: 300px" src="{{ URL::asset($prod->photo) }}" alt="{{ $prod->title }}">
        <p>Résumé : {{ $prod->description }}</p>
        <p>Disponibilité : Actuellement disponible à {{ $prod->location }} pour : {{ $prod->price }} €</p>
    </div>
    <hr>
@endforeach