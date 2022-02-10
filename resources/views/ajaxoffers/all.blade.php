@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('success'))
    <div class="alert alert-warning" role="alert">
      {{Session::get('success')}}
    </div>
    @endif
</div>
<table class="table table-dark table-striped" enctype="multipart/form-data">
    <thead>

      <tr>
        <th scope="col">#</th>
        <th scope="col">{{__('messages.OfferName')}}</th>
        <th scope="col">{{__('messages.Offerprice')}}</th>
        <th scope="col">{{__('messages.Offerdetails')}}</th>
        <th scope="col">{{__('messages.OfferImage')}}</th>
        <th scope="col">{{__('messages.Actions')}}</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($offers as $offer )
      <tr>
        <td>{{$offer->id}}</td>
        <td>{{$offer->name}}</td>
        <td>{{$offer->price}}</td>
        <td>{{$offer->details}}</td>
        <td><img src="{{asset($offer->photo)}}" /></td>
        <td><a href="{{route('edit_offer',['offer_id'=>$offer->id])}}" class="btn btn-success" >{{__('messages.Update')}}</a>
        <a href="{{route('offer.destroy',['offer_id'=>$offer->id])}}" class="btn btn-success" >{{__('messages.delete')}}</a>
        <a href="{{route('ajax-offer.all',['offer_id'=>$offer->id])}}" class="btn btn-success" >{{__('messages.delete')}}/ajax</a>
    </td>

      </tr>

         @endforeach
    </tbody>
  </table>

@endsection
