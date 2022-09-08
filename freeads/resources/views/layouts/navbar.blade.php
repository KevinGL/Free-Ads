<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Free Ads</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="/">Accueil
            <span class="visually-hidden">(current)</span>
          </a>
        </li>

        @if(Auth::user())

        <li class="nav-item">
          <a class="nav-link" href="/products/add">Ajouter un produit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/products">Voir vos produits</a>
        </li>

        
          @if(Auth::user()->admin == "1")
            <li class="nav-item">
              <a class="nav-link" href="/users">Voir les utilisateurs</a>
            </li>
          @endif

          <form class="d-flex" action="{{ route('logout') }}" method="post">
            @csrf
            <input class="form-control me-sm-2" type="submit" value="Se déconnecter" />
          </form>

        @else
          <li class="nav-item">
            <div class="container">
              <a href="{{ route('login') }}">
                <button type="button" class="btn btn-info">Se connecter</button>
              </a>
            </div>
          </li>

          <li class="nav-item">
            <div class="container">
              <a href="{{ route('register') }}">
                <button type="button" class="btn btn-info">S'inscrire</button>
              </a>
            </div>
          </li>
        @endif

      </ul>
      <form class="d-flex" method="post" action="{{ route('product.search') }}">
        @csrf
        <input class="form-control me-sm-2" type="text" placeholder="Recherche" name="search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Recherche</button>
      </form>
    </div>
  </div>
</nav>