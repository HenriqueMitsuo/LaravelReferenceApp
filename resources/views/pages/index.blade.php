@extends('layouts.app')
    @section('content')
        <div class="jumbotron text-center mt-3">
            <h1 class="display-4">{{$title}}</h1>
            <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil aperiam, velit fuga quas quasi incidunt?</p>
            <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
            <a class="btn btn-success btn-lg" href="/register" role="button">Register</a>
        </div>
    @endsection


