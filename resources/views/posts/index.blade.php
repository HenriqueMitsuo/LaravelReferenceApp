@extends('layouts.app')

@section('content')
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card mt-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/storage/cover_images/{{$post->cover_image}}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->posts_title}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Written on {{$post->created_at}} by {{$post->user->name}}</h6>
                            <a href="/posts/{{$post->posts_id}}" class="card-link">Read +</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mb-2"></div>
        {{$posts->links()}}
    @else
        <p>No Post Found!</p>
    @endif
@endsection
