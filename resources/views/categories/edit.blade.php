@extends('layouts.app')

@section('content')

 <form  action="{{route('category.update',$category->id)}}" method="post">
     @csrf
     @method('PATCH')
     <h2> categories</h2>

     <div class="form-group">
         <input class="form-control" type="text" placeholder="name" name="name" value="{{$category->name}}" autofocus>
         @error('name')
         <span class="text-danger small" role="alert">
                     <strong>{{$message}}</strong>
                </span>
         @enderror
     </div>
        <button class="btn btn-primary">save</button>
 </form>



@endsection
