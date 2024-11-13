<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h5>{{$post->id}}</h5>
<h3>{{$post->name}}</h3>
<ul>
@foreach($comments as $comment)
<li>{{$comment->comment}}</li>

@endforeach
</ul>
</body>
</html>
