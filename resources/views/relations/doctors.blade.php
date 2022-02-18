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
        <th scope="col">title</th>
        <th scope="col">action</th>

    </tr>
    </thead>
    <tbody>
        @if (isset($doctors) && $doctors->count()>0)
        @foreach ($doctors as $doctor )
      <tr>
        <td>{{$doctor->id}}</td>
        <td>{{$doctor->name}}</td>
        <td>{{$doctor->title}}</td>
        <td><a href="" class="btn btn-success" ></a>
        </td>

      </tr>
         @endforeach
         @endif
    </tbody>
  </table>

@endsection
