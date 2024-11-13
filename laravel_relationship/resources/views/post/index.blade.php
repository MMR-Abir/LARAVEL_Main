<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Table</title>
</head>
<body>
<table border="1">
<tr>
<th>ID</th>
<th>Name</th>
<th>Comments</th>
</tr>

@foreach($posts as $post)
<tr>
<td>{{$post->id}}</td>
<td>{{$post->name}}</td>
<td>  <a href="{{route('show', $post->id)}}">Details</a></td>
</tr>

@endforeach

</table>
</body>
</html>
