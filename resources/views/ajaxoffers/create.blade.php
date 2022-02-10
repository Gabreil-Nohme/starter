@extends('layouts.app')

@section('content')
<form method="POST" id="offerForm" action="{{route('ajax-offer.store')}}" enctype="multipart/form-data">

  @csrf
  <div class="alert alert-success" id="success_msg" style="display: none;">
    created
  </div>

  <h1>{{__('messages.input your offer')}}</h1>
  <div class="form-group">
    <label for="photo" class="form-label">File photo content</label>
<input type="file" name="photo" id="photo">
 </div>
  @error('photo')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
<div class="mb-3 row">
    <label  class="col-sm-2 col-form-label">{{__('messages.OfferNameAr')}}</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="name_ar" placeholder="{{__('messages.input name')}}">
    </div>
    @error('name_ar')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3 row">
    <label  class="col-sm-2 col-form-label">{{__('messages.OfferNameEn')}}</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="name_en" placeholder="{{__('messages.input name')}}">
    </div>
    @error('name_en')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3 row">
    <label  class="col-sm-2 col-form-label">{{__('messages.Offerprice')}}</label>
    <div class="col-sm-10">
      <input type="text" class="form-control-plaintext" name="price" placeholder="{{__('messages.input price')}}">
    </div>
    @error('price')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">{{__('messages.OfferdetailsAr')}}</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="details_ar" placeholder="{{__('messages.input details')}}">
    </div>
    @error('details_ar')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>
  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">{{__('messages.OfferdetailsEn')}}</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="details_en" placeholder="{{__('messages.input details')}}">
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
@section('script')
    <script>
        $(document).on('click',#save_offer,function(e){
            e.preventDefault();//save امنع اي عملية ونفذ ال
            var formData = new FormData($('#offerForm')[0]);
            $.ajax({
                type:'post',
                enctype:'multipart/form-data',
                url:"{{route('ajax-offer.store')}}",
                data:formData,
                processData: false,
                contentType: false,
                cache: false,
                success:function(data){
                    if (data.status == true)
                        $('#success_msg').show();

                },error:function(reject){

                }
            });

        });
    </script>
@stop
