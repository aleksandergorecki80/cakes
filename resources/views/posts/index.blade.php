@extends('layouts.app')

@section('content')
    @include('inc.carousel')
    <main class="container">
        <div class="posts">
            <div class="row">
                @if(count($posts)>0)
                    @foreach ($posts as $post)
                    
                        <div class="col-md-6 post">
                            <div class="image">
                                <a href="/posts/{{ $post->id }}/">
                                    <img src="/storage/cover_images/{{ $post->cover_image }}" alt="">
                                </a>
                            </div>
                            <a href="/posts/{{ $post->id }}/">
                                <h3 class="text-center">{{ $post->title }}</h3>
                            </a>
                                <p>{!! $post->body !!}</p>
                        </div>
                    @endforeach
                    {{ $posts->links() }}
                @else
                    <p>No post found</p>
                @endif
            </div>
        </div>
    </main>
@endsection