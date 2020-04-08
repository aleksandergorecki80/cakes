<nav class="navbar navbar-expand-lg navbar-light bg-light container">
  <a class="navbar-brand" href="/"><img src="/storage/layout_images/logo_BC.png" alt="Logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>



  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/">Start</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kategorie
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @if(count($categories)>0)
            @foreach ($categories as $category)
            <a class="dropdown-item" href="/category/{{ $category->id }}">{{ $category->title }} </a>
            @endforeach
          @endif
          {{-- <div class="dropdown-divider"></div> --}}
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about">O mnie</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/contact">Kontakt</a>
      </li>
    </ul>
    <form action="/search" method="GET" class="form-inline my-2 my-lg-0">
      <div class="search">
        <input class="search-input" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="search-button" type="submit"><img src="/storage/layout_images/search.svg" alt="Search" class="search-button-img"></button>
      </div>
    </form>
  </div>
</nav>