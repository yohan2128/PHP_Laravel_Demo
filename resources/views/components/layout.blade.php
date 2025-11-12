<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Portal</title>

    @vite('resources/css/app.css')
</head>
<body>
    <header>
        <nav>
            <h1>Welcome {{ auth()->guard()->user()->name ?? 'User'}}!</h1>
            <ul>
                <li><a href="{{ route('userPortal.index') }}">Home</a></li>
                <li><a href="/userPortal">User Portal</a></li>
                <li><a href="{{ route('userPortal.about') }}">CSS Test</a></li>
            </ul>
        </nav>
    </header>

</body>
</html>