@extends('layouts.app')
@section('content')
    {{--    $table->string('file')->nullable();--}}
    <form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Header" name="news_header"
                   value="{{$post->news_header}}" autofocus>

            @error('news_header')
            <span class="text-danger small" role="alert">
                     <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
        <textarea class="ckeditor form-control" name="description">
            {!!$post->description!!}
        </textarea>
            @error('description')
            <span class="text-danger small" role="alert">
                     <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <input type="checkbox" name="status" value=1>
            <label for="status"> status</label><br>

        </div>
        @if($post->image)
            <div>
                <img src="{{'/'.$post->image}}" width="100px" alt="image">
            </div>
        @endif
        <div class="form-group">
            <label for="image"> Change cover image</label>
            <input class="form-control-file" type="file" name="image">
        </div>
        <br>
        <div class="form-group">
            <label for="files"> add files to post gallery</label>
            <input class="form-control-file" type="file" name="files[]" multiple>
        </div>

        <button type="submit" class="btn btn-primary">save</button>
        <button type="reset" class="btn btn-danger">cancel</button>
    </form>

    <style>
        label {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
    <script src="{{asset('assets/dropZone/dropzone.min.js')}}"></script>


@endsection
