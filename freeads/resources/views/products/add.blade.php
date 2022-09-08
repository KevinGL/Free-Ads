@include('layouts.app')

<div class="container">

    <h1>Ajouter un produit</h1>

    <form action="{{ route('products.validate') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputText" class="form-label mt-4">Titre</label>
            <input type="text" name="title" class="form-control" id="exampleInputText" placeholder="Titre du produit" required="required">
        </div>

        <div class="form-group">
            <label for="exampleInputText" class="form-label mt-4">Prix</label>
            <input type="text" name="price" class="form-control" id="exampleInputText" placeholder="Prix du produit" required="required">
        </div>
        
        <div class="form-group">
            <label for="exampleSelect1" class="form-label mt-4">Catégorie du produit</label>
            <select class="form-select" name="category" id="exampleSelect1">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleTextarea" class="form-label mt-4">Description</label>
            <textarea class="form-control" name="description" id="exampleTextarea" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="formFile" class="form-label mt-4">Choisir une image</label>
            <input class="form-control" name="photo" type="file" id="formFile" required="required">
        </div>

        <div class="form-group">
            <label for="exampleInputText" class="form-label mt-4">Ville</label>
            <input type="text" name="location" class="form-control" id="exampleInputText" placeholder="Ville">
        </div>

        <button type="submit" class="btn btn-primary">Valider</button>

    </form>
</div>
