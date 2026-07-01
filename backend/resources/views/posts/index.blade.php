<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new Project</title>
</head>
<body>
    <h1>All Posts</h1>
    <a href="{{route('posts.create')}}">create new post</a>
    @foreach($posts as $post)
        <h2>{{$post->title}}</h2>
        <p>{{$post->body}}</p>
        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
        <form action="{{route('posts.destroy',$post->id)}}" method="post" >
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('are you sure you want to delete this post ?')">DELETE</button>
        </form> 
    @endforeach
</body>
</html>