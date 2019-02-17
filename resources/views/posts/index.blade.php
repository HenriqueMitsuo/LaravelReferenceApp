@extends('layouts.app')

@section('content')
    <h1>Post</h1>
    @if (count($posts) > 1)
        @foreach ($posts as $post)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$post->posts_title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Written on {{$post->created_at}}</h6>
                <div class="card-text">{{$post->posts_body}}</div>
                <a href="#" class="card-link">Read +</a>
                </div>
            </div>
        @endforeach
    @else
        <p>No Post Found!</p>
    @endif
@endsection
