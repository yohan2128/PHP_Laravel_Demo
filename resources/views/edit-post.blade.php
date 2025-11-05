<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="/edit-post/{{$post->id}}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" name="title" id="title", value="{{$post->title}}"><br>
        <label for="body">Post:</label>
        <textarea name="body" id="body" cols="30" rows="10">{{$post->body}}</textarea><br>
        <button>Save</button> 
        <a href="/cancel-edit" style="font-weight: bold">Cancel Edit</a>
    </form>
</body>
</html>