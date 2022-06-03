@extends('layouts.shared-layout')


@section('title')
create message
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
<form class="mt-4" method="post" action="{{url('message/store')}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Ur Name</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}" id="exampleInputEmail1" aria-describedby="emailHelp">

      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Ur Email</label>
        <input type="email" name="email" class="form-control" value="{{old('email')}}" id="exampleInputEmail1" aria-describedby="emailHelp">

      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Ur Phone</label>
        <input type="tel" name="phone" class="form-control" value="{{old('phone')}}" id="exampleInputEmail1" aria-describedby="emailHelp">

      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Ur Message</label>
        <textarea type="text" name="message" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">{{old('message')}}</textarea>
      </div>
    <button type="submit" class="btn btn-primary">Send Message</button>
  </form>

@endsection
