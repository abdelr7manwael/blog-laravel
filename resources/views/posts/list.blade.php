@extends('layouts.shared-layout')
@section('title')
Posts List
@endsection

@section('content')
<div class="d-flex flex-wrap">
@foreach ($posts as $p )
<div class="card m-3" style="width: 18rem;">
    <img src="{{url('img/',$p->image)}}" class="card-img-top" alt="NO_IMG">
    <div class="card-body">
      <h5 class="card-title">{{$p->title}}</h5>
      <p class="card-text">{{$p->desc}}</p>
      <p class="card-text">Admin: {{$p->admin->email}}</p>
      <a href="{{url('posts/show',$p->id)}}" class="btn btn-primary">SHOW</a>
    </div>
  </div>

@endforeach
</div>
@endsection
