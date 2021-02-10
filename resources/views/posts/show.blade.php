@extends('layouts.app')
@section('content')

    <div class="row">

        <div class="col-6">
            <h1>{{$post->news_header}}</h1>
            <h2>{{$post->author->name}}</h2>
            <span>{{$post->time}}</span>
        </div>

        <div class="col-6">
            <img src="{{$post->image}}" width="100%" alt="image">
        </div>
    </div>
    <div class="row">
        <p>{{$post->description}}</p>
    </div>

    <div class="row">
        <ul class="d-inline">
            @foreach($post->files as $file)
                <li class="m-1">
                    <a href="{{$file->url}}" class="btn btn-info"> {{$file->name}}</a>
                </li>
            @endforeach
        </ul>


    </div>
@endsection
