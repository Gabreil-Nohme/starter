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
        <th scope="col">name</th>
        <th scope="col">address</th>
        <th scope="col">actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($hospitals as $hospital )
      <tr>
        <td>{{$hospital->id}}</td>
        <td>{{$hospital->name}}</td>
        <td>{{$hospital->address}}</td>
        <td>
            <a href="{{route('viewDoctors',['h_id'=>$hospital->id])}}" class="btn btn-success" >View Doctors</a>
            <a href="{{route('deleteHospital',['h_id'=>$hospital->id])}}" class="btn btn-danger" >Delete</a>
        </td>

      </tr>

         @endforeach
    </tbody>
  </table>

@endsection
