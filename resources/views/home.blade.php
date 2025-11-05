<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        input {
            border: 1px solid black;
            margin: 5px;
        }

        div {
            border: 1px solid black;
        }

        div.postsContent {
            border: 1px solid black;
            background: gray;
            margin: 5px;
            padding: 5px;
        }
    </style>
</head>

<body>
    @auth
        <h1>Welcome {{ auth()->user()->name }}!</h1>
        <div name="logout-content">
            <form action="/logout" method="POST">
                @csrf
                <button>Log out</button>
            </form>
        </div>

        <div name="createPost-Content">
            <h1>Create a Post!</h1>
            <form action="/create-post" method="POST">
                @csrf
                <label for="title">Title:</label>
                <input type="text" name="title" id="title", placeholder="title"><br>
                <label for="body">Post:</label>
                <textarea name="body" id="body" cols="30" rows="10"></textarea><br>
                <button>Submit</button>
            </form>
        </div>

        <div name="posts-content">
            <h2>POSTS!</h2>
            @foreach ($posts as $post)
                <div name="postsContent">
                    <h3>{{ $post['title'] }} by {{ $post->user->name }}</h3><br>
                    {{ $post['body'] }}<br>
                    <p><a href="/edit-post/{{ $post->id }}">Edit</a></p>
                </div>
                <form action="/delete-post/{{ $post->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            @endforeach
        </div>
    @else
        <div name="register-content">
            <h1>Register!</h1>
            <form action="/register" method="POST">
                @csrf
                <label for="name">Name:</label>
                <input type="text" placeholder="name" name="name" id="name"><br>
                <label for="email">Email:</label>
                <input type="email" placeholder="email" name="email" id="email"><br>
                <label for="password">Password:</label>
                <input type="password" placeholder="password" name="password" id="password"><br>
                <button type="submit">Register</button>
            </form>
        </div>
        <div name="login-content">
            <h1>Log In!</h1>
            <form action="/login" method="POST">
                @csrf
                <label for="loginName">Name:</label>
                <input type="text" placeholder="name" name="loginName" id="loginName"><br>
                <label for="loginPassword">Password:</label>
                <input type="password" placeholder="password" name="loginPassword" id="loginPassword"><br>
                <button type="submit">Log In</button>
            </form>
        </div>
    @endauth

</body>

</html>
