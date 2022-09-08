@include('layouts.app')

<div class="container">
    <h2>{{ $product->title }}</h2>
    <h3>(Catégorie : {{ $category }})</h3>
    <img style="height: 300px" src="{{ URL::asset($product->photo) }}" alt="{{ $product->title }}">
    <p>Résumé : {{ $product->description }}</p>
    <p>Disponibilité : Actuellement disponible à {{ $product->location }} pour : {{ $product->price }} €</p>
</div>