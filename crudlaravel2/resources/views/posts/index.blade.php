@extends('layout')

@section('content')

<div class="row">

<div class="col-lg-12">

@if(session('success'))

<div class="alert alert-success">{{session('success')}}</div>

@endif
<h1>Post List</h1>
<a href="{{route('posts.create')}}" class="btn btn-success float-right">New Post</a>
<table class="table table-stripped">

<tr>

<th>ID</th>
<th>NAME</th>
<th>DETAILS</th>
<th>IMAGE</th>
<th>ACTION</th>

</tr>


@foreach($posts as $post)
<tr>
<td>{{$i++}} </td>
<td>{{$post->name}} </td>
<td>{{$post->detail}} </td>
<td><img src="/images/{{$post->image}}" alt="" width="100"/> </td>



<td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-info">EDIT</a> <br>
<a href="{{route('posts.show', $post->id)}}" class="btn btn-success">SHOW</a>


<form action="{{route('posts.destroy', $post->id)}}" method="post">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">DELETE</button>
</form>


</td>
</tr>




@endforeach

</table>
</div>
</div>


@endsection
