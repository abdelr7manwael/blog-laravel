@extends('layouts.shared-layout')


@section('title')
Admin login
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
<form class="mt-4" method="post" action="{{url('admins/handlelogin')}}" enctype="multipart/form-data">
    @csrf

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Admin Email</label>
        <input type="email" name="email" class="form-control" value="{{old('email')}}" id="exampleInputEmail1" aria-describedby="emailHelp">

      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Admin Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

      </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>

@endsection
