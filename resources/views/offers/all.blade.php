@extends('layouts.app')

@section('content')

<table class="table table-dark table-striped">
    <thead>

      <tr>
        <th scope="col">#</th>
        <th scope="col">{{__('messages.OfferName')}}</th>
        <th scope="col">{{__('messages.Offerprice')}}</th>
        <th scope="col">{{__('messages.Offerdetails')}}</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($offers as $offer )
      <tr>
        <td>{{$offer->id}}</td>
        <td>{{$offer->name}}</td>
        <td>{{$offer->price}}</td>
        <td>{{$offer->details}}</td>

      </tr>

         @endforeach
    </tbody>
  </table>

@endsection
