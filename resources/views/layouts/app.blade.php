<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Welcome {{ auth()->guard()->user()->name ?? 'User'}}!</h1>
    </header>

    <main>
        <div class="main-content">
            @yield('content')
        </div>
        @yield('siderbar')
    </main>

    <footer>
        <p>&copy; My App</p>
    </footer>
</body>
</html>