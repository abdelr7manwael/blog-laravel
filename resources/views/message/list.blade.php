@extends('layouts.shared-layout')
@section('title')
Admins List
@endsection

@section('content')
<table class="table mt-5">
    <thead>
      <tr>

          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($messages as $m )
      <tr>

          <td>{{$m->name}}</td>
          <td>{{$m->email}}</td>
          <td>{{$m->phone}}</td>
        <td><a class="btn btn-danger" href="{{url('message/destroy',$m->id)}}">Delete</a></td>
      </tr>
      @endforeach

    </tbody>
</table>





@endsection
