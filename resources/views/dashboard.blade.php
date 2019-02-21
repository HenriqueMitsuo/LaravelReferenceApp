@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <h3 class="mt-3">Your blog posts</h3>
                    @if (count($posts) > 0)
                        <table class="table table-bordered table-hover">
                            <thead class="thead">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <th scope="row">{{$post->posts_id}}</th>
                                        <td>{{$post->posts_title}}</td>
                                        <td>{{$post->created_at}}</td>
                                        <td>
                                            <a href="/posts/{{$post->posts_id}}/edit" class="btn btn-secondary">Edit</a>
                                            {!!Form::open(['action' => ['PostsController@destroy', $post->posts_id], 'method' => 'POST', 'class' => 'd-inline card-link'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'btn btn-danger text-right'])}}
                                            {!!Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>You have no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
