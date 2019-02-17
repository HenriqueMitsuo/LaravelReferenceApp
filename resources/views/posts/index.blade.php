@extends('layouts.app')

@section('content')
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card container mt-3">
                <div class="card-body">
                    <h5 class="card-title">{{$post->posts_title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Written on {{$post->created_at}}</h6>
                <div class="card-text">{{$post->posts_body}}</div>
                <a href="/posts/{{$post->posts_id}}" class="card-link">Read +</a>
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No Post Found!</p>
    @endif
@endsection
