@extends('layouts.app')

@section('content')
    <div class="card container mt-3">
        <div class="card-body">
            <h1 class="card-title">{{$post->posts_title}}</h1>
        <h6 class="card-subtitle mb-2 text-muted">Written on {{$post->created_at}}</h6>
        <div class="card-text">{{$post->posts_body}}</div>
        <a href="/posts" class="card-link">Go back</a>
        </div>
    </div>
@endsection
