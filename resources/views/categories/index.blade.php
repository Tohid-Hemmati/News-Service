@extends('layouts.app')
@section('content')
    <table class="table">
        <th>row</th>
        <th> category name</th>
        <th> edit</th>
        <th> delete</th>
        @foreach($categories as $key=> $category)
            <tr>
                <td>
                    {{$key+1}}
                </td>
                <td>
                    {{$category->name}}
                </td>
                <td>
                        <a class="btn btn-primary" href="{{route('category.edit',$category->id)}}">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{route('category.destroy',$category->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>

            </tr>
        @endforeach
    </table>
@endsection
