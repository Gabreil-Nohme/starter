@extends('layouts.app')

@section('content')
<h1 class="title m-b-md">
viewer({{$video->viewers}})
</h1>
<div class="row">
<iframe width="560" height="315" src="https://www.youtube.com/embed/GVNDbTwOSiw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


</div>
@endsection

