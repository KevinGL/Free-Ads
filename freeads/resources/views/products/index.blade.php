@include('layouts.app')

<div class="container">
    <table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Description</th>
            <th scope="col">Prix</th>
            <th scope="col">Ville</th>
        </tr>
    </thead>
    <tbody>

        @for($i=0 ; $i<count($products) ; $i++)
            @if(Auth::user()->admin == "1")
                <tr class="table-primary">
                    <th scope="row">{{ $products[$i]->title }}</th>
                    <td>{{ $categories[$i]["title"] }}</td>
                    <td>{{ $products[$i]->description }}</td>
                    <td>{{ $products[$i]->price }}</td>
                    <td>{{ $products[$i]->location }}</td>
                    <td>
                        <a href="{{ route('product.edit', $products[$i]->id) }}"><button type="button" class="btn btn-warning">Modifier</button></a>
                        <a href="{{ route('product.delete', $products[$i]->id) }}"><button type="button" class="btn btn-danger">Supprimer</button></a>
                        <a href="{{ route('product.show', $products[$i]->id) }}"><button type="button" class="btn btn-info">Voir</button></a>
                    </td>
                </tr>
            @else
                @if(Auth::user()->id == $products[$i]->user_id)
                    <tr class="table-primary">
                        <th scope="row">{{ $products[$i]->title }}</th>
                        <td>{{ $categories[$i]["title"] }}</td>
                        <td>{{ $products[$i]->description }}</td>
                        <td>{{ $products[$i]->price }}</td>
                        <td>{{ $products[$i]->location }}</td>
                        <td>
                        <a href="{{ route('product.edit', $products[$i]->id) }}"><button type="button" class="btn btn-warning">Modifier</button></a>
                        <a href="{{ route('product.delete', $products[$i]->id) }}"><button type="button" class="btn btn-danger">Supprimer</button></a>
                        <a href="{{ route('product.show', $products[$i]->id) }}"><button type="button" class="btn btn-info">Voir</button></a>
                        </td>
                    </tr>
                @endif
            @endif
        @endfor

    </tbody>
    </table>
</div>