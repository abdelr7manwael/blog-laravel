@extends('layouts.shared-layout')


@section('title')
create post
@endsection

@section('content')
@if ($errors->any())
    <div class="my-3 alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="mt-4" method="post" action="{{url("posts/update/$post->id")}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Post Title</label>
        <input type="text" name="title" class="form-control" value="{{$post->title}}" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Post desc</label>
        <input type="text" name="desc" class="form-control" value="{{$post->desc}}" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Post image</label>
        <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Post content</label>
        <textarea type="text" name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">{{$post->content}}</textarea>
      </div>
    <button type="submit" class="btn btn-primary">Update Post</button>
  </form>

@endsection
