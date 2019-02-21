@extends('layouts.app')

@section('content')
    <div class="card container mt-3">
        <div class="card-body">
            <h1 class="card-title">{{$post->posts_title}}</h1>
        <h6 class="card-subtitle mb-2 text-muted">Written on {{$post->created_at}} by {{$post->user->name}}</h6>
        <div class="card-text">{!!$post->posts_body!!}</div>
        <hr>
        <a href="/posts" class="card-link btn btn-secondary">Go back</a>
        <a href="/posts/{{$post->posts_id}}/edit" class="card-link btn btn-dark">Edit</a>

        {!!Form::open(['action' => ['PostsController@destroy', $post->posts_id], 'method' => 'POST', 'class' => 'd-inline card-link'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger text-right'])}}
        {!!Form::close() !!}
        </div>
    </div>
@endsection
