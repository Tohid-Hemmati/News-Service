@extends('layouts.app')
@section('content')




    <table class="table table-striped table-sm text-center align-content-center">
        <thead>
        <tr>
            <th>#</th>
            <th>author</th>
            <th>category</th>
            <th>News Header</th>
            <th>description</th>
            <th>image</th>
            <th>status</th>
            <th>Time</th>
            <th>Details</th>
            @if(auth()->user()->hasRole('author')||auth()->user()->hasRole('super-admin'))
                <th>Edit</th>
                <th>Delete</th>
            @endif
        </tr>
        </thead>

        <tbody>

        @foreach($posts as $key=>$post)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$post->author->name}}</td>
                <td>{{$post->category->name}}</td>
                <td>{{$post->news_header}}</td>
                <td>{{$post->description}}</td>
                <td><img style="max-width:100px " src="{{$post->image}}"></td>
                @if($post->status==1)
                    <td> Active Author</td>
                @else
                    <td> Inactive Author</td>
                @endif
                <td>{{$post->time}}</td>
                <td>
                    <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">
                        News Detail
                    </a>
                </td>
                @can('maintain_posts',$post)
                    <td>
                        <a class="btn btn-primary" href="{{route('posts.edit',$post->id)}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('posts.destroy',$post->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                @endcan
            </tr>
        @endforeach

        </tbody>

    </table>
    @if($posts->isEmpty())
        <h2>No posts</h2>
    @endif




@endsection
