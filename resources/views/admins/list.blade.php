@extends('layouts.shared-layout')
@section('title')
Admins List
@endsection

@section('content')
<table class="table mt-5">
    <thead>
      <tr>

          <th scope="col">Id</th>
        <th scope="col">User Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($admins as $a )
      <tr>

        <td>{{$a->id}}</td>
        <td>{{$a->username}}</td>
        <td>{{$a->email}}</td>
        <td><a class="btn btn-danger" href="{{url('admins/destroy',$a->id)}}">Delete</a></td>
      </tr>
      @endforeach

    </tbody>
</table>





@endsection
