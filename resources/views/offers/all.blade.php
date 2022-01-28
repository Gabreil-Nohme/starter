@extends('layouts.app')

@section('content')

<table class="table table-dark table-striped">
    <thead>

      <tr>
        <th scope="col">#</th>
        <th scope="col">{{__('messages.OfferName')}}</th>
        <th scope="col">{{__('messages.Offerprice')}}</th>
        <th scope="col">{{__('messages.Offerdetails')}}</th>
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
        <td><a href="{{route('edit_offer',['offer_id'=>$offer->id])}}" class="btn btn-success" >{{__('messages.Update')}}</a> </td>

      </tr>

         @endforeach
    </tbody>
  </table>

@endsection
