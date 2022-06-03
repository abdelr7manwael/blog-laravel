@extends('layouts.shared-layout')

@section('title')
post
@endsection


@section('content')
<div class="m-5 d-flex flexwrap justify-content-between">
    <div class="col-md-5">
        <img class="img-fluid rounded" src="{{url('img/',$post->image)}}" alt="NOIMG">

    </div>
    <div class="col-md-6">
        <h1>ID: {{$post->id}}</h1>
        <h1>Title: {{$post->title}}</h1>
        <h5>{{$post->desc}}</h5>
        <p>{{$post->content}}</p>
        <p>Admin: {{$post->admin->email}}</p>
        @if(Auth::user())
        <a class="btn btn-info" href="{{url('posts/edit',$post->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{url('posts/delete',$post->id)}}">Delete</a>
    @endif
    </div>
</div>
@endsection
