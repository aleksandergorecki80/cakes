@if(count($posts)>0)
    @foreach ($posts as $post)
        {{ $post->title }}    
    @endforeach
@endif

<div id="carouselExampleCaptions" class="carousel slide my-slides" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/storage/slides_images/ciasta.jpg" class="d-block w-100 slide-img" alt="...">
      <div class="container slide-description">
        <div class="row">
          <div class="col-md-8">
            <div class="carousel-caption d-none d-md-block">
              <h1>Ciasta</h1>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
              <input type="submit" value="Zobacz" class="my-button">
            </div>
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/storage/slides_images/torty.jpg" class="d-block w-100 slide-img" alt="...">
      <div class="container slide-description">
        <div class="row">
          <div class="col-md-8">
            <div class="carousel-caption d-none d-md-block">
              <h1>Torty</h1>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
              <input type="button" value="Zobacz" class="my-button">
            </div>
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/storage/slides_images/babeczki.jpg" class="d-block w-100 slide-img" alt="...">
      <div class="container slide-description">
        <div class="row">
          <div class="col-md-8">
            <div class="carousel-caption d-none d-md-block">
              <h1>Babeczki i ciastka</h1>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
              <input type="button" value="Zobacz" class="my-button">
            </div>
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </div>
  </div>
  {{-- <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span> --}}
  </a>
</div>