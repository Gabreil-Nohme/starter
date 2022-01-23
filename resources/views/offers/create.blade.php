@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('offer.store')}}">
  @csrf
  <div class="container">
      @if (Session::has('success'))
      <div class="alert alert-warning" role="alert">
        {{Session::get('success')}}
      </div>
      @endif
  <h1>input your offer</h1>
<div class="mb-3 row">
    <label  class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="name" placeholder="input name">
    </div>
    @error('name')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3 row">
    <label  class="col-sm-2 col-form-label">price</label>
    <div class="col-sm-10">
      <input type="text" class="form-control-plaintext" name="price" placeholder="input price">
    </div>
    @error('price')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">details</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="details" placeholder="input details">
    </div>
    @error('details')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="row">
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3" >send</button>
  </div>
</div>
</div>
</form>
@endsection
