<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new Project</title>
</head>
<body>
    <h1>All Posts</h1>
    @foreach($posts as $post){
        <h2>{{$post->title}}</h2>
        <p>{{$post->body}}</p>
    }
</body>
</html>