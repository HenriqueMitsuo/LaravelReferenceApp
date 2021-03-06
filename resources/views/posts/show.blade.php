@extends('layouts.app')

@section('content')
    <div class="card mt-3">
        <img src="/storage/cover_images/{{$post->cover_image}}" class="card-img" alt="...">

        <div class="card-body">
            <h1 class="card-title">{{$post->posts_title}}</h1>

            <h6 class="card-subtitle mb-2 text-muted">Written on {{$post->created_at}} by {{$post->user->name}}</h6>
            <div class="card-text">{!!$post->posts_body!!}</div>
            <hr>
            <a href="/posts" class="card-link btn btn-secondary">Go back</a>
            @if (!Auth::guest())
                @if (Auth::user()->id == $post->user->id)
                    <a href="/posts/{{$post->posts_id}}/edit" class="card-link btn btn-dark">Edit</a>
                    {!!Form::open(['action' => ['PostsController@destroy', $post->posts_id], 'method' => 'POST', 'class' => 'd-inline card-link'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger text-right'])}}
                    {!!Form::close() !!}
                @endif
            @endif
        </div>
    </div>
@endsection

{{-- Now in laravel 5.6 you can easily check weather the user authenticated using Authentication Directives in your blades.
@auth <!-- your blade codes --> @endauth (check authenticated )
@guest <!-- your blade codes --> @endguest (check not authenticated ) --}}
