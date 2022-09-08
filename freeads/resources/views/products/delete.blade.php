@include('layouts.app')

<div class="container">
    <div class="alert alert-dismissible alert-danger">
        Êtes-vous sûr de vouloir supprimer <strong>définitivement</strong> le produit <em>{{ $product->title }}</em> ?<br>
        <a href="{{ route('product.validDelete', $product->id) }}"><button type="button" class="btn btn-secondary">Oui</button></a>
        <a href="/products"><button type="button" class="btn btn-secondary">Non</button></a>
    </div>
</div>