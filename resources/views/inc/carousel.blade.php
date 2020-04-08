<div id="carouselExampleCaptions" class="carousel slide my-slides" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>

<div class="carousel-inner">
{{-- wnętrze slidera --}}

{{-- @if(count($categories)>0)
  @foreach ($categories as $category)
    {{ $category->title }}    
    {{ $category->slider_image }}    <br>
  @endforeach
@endif --}}

  @if(count($categories)>0)
    @foreach ($categories as $category)
      <div class="carousel-item">
        <img src="/storage/slides_images/{{ $category->slider_image }}" class="d-block w-100 slide-img" alt="...">
        <div class="container slide-description">
          <div class="row">
            <div class="col-md-8">
              <div class="carousel-caption d-none d-md-block">
                <h1>{{ $category->title }}</h1>
                <p>{{ $category->body }}</p>
                <a type="submit" href="/category/{{ $category->id }}" class="my-button">Zobacz</a>
              </div>
            </div>
            <div class="col-md-4"></div>
          </div>
        </div>
      </div>
    @endforeach
  @endif
    {{-- do tąd wnętrze slidera --}}
</div>
  {{-- <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span> 
  </a>--}}
</div>