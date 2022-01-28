@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('offer.update_offer',['offer_id'=>$offer->id])}}">
  @csrf
  <div class="container">
      @if (Session::has('success'))
      <div class="alert alert-warning" role="alert">
        {{Session::get('success')}}
      </div>
      @endif
  <h1>{{__('messages.update offer')}}</h1>
<div class="mb-3 row">
    <label  class="col-sm-2 col-form-label">{{__('messages.OfferNameAr')}}</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="name_ar" value="{{$offer->name_ar}}" placeholder="{{__('messages.input name')}}">
    </div>
    @error('name_ar')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3 row">
    <label  class="col-sm-2 col-form-label">{{__('messages.OfferNameEn')}}</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="name_en" value="{{$offer->name_en}}" placeholder="{{__('messages.input name')}}">
    </div>
    @error('name_en')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3 row">
    <label  class="col-sm-2 col-form-label">{{__('messages.Offerprice')}}</label>
    <div class="col-sm-10">
      <input type="text" class="form-control-plaintext" name="price" value="{{$offer->price}}" placeholder="{{__('messages.input price')}}">
    </div>
    @error('price')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">{{__('messages.OfferdetailsAr')}}</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="details_ar" value="{{$offer->details_ar}}" placeholder="{{__('messages.input details')}}">
    </div>
    @error('details_ar')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">{{__('messages.OfferdetailsEn')}}</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="details_en" value="{{$offer->details_en}}" placeholder="{{__('messages.input details')}}">
    </div>
    @error('details_en')
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
