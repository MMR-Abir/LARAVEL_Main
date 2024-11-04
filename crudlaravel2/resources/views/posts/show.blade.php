@extends('layout')

@section('content')

<div class="row">
<div class="col-lg-12">


<h5>ID: {{$post->id}}</h5>
<h2>Name:{{$post->name}}</h2>
<P>Details: {{$post->detail}}</P>
<img src="/images/{{$post->image}}" alt="" width="100"/>

</div>

</div>

@endsection
