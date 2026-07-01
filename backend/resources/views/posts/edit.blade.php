<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit page</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="POST" action="{{route('posts.update',$post->id)}}">
        @csrf
        @method('PUT')
            <label >Title</label>
            <input type="text" name="title" value="{{old('title',$post->title)}}">
            <label >body</label>
            <textarea type="text" name="body">{{old('body',$post->body)}}</textarea>
            <button type="submit">update</button>
               
    </form>
     @if($errors->any())
        <ul>
            @foreach($errors as error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>