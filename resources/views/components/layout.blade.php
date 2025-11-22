<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Portal</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-200 min-h-screen flex flex-col">
    <header class="bg-black shadow">
        <div class="container mx-auto p-4">
            <div class="mb-4">
                <a href="{{ route('userPortal.index') }}">
                    <h1 class="text-3xl font-bold text-violet-700">User Portal</h1>
                </a>
            </div>
            <nav class="flex items-center justify-between">
                <ul class="flex space-x-10 items-center text-base font-medium">
                    <li>
                        <a class="flex-1 text-gray-50 hover:text-violet-600" href="{{ route('userPortal.index') }}">Home</a>
                    </li>
                    <li>
                        <a class="flex-1 text-gray-50 hover:text-violet-600" href="{{ route('userPortal.showAbout') }}">About</a>
                    </li>
                </ul>
                <div class="flex items-center space-x-4">
                    @auth
                        <span class="font-bold text-violet-700">Welcome {{ auth()->guard()->user()->name }}!</span>
                        <form action="/logout" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-red-600 underline">Log out</button>
                        </form>
                    @else
                        <a class="text-gray-50 hover:text-violet-600" href="{{ route('userPortal.showSignIn') }}">Sing In</a>
                        <a class="text-gray-50 hover:text-violet-600" href="{{ route('userPortal.showSignUp') }}">Sing Up</a>
                    @endauth
                </div>
            </nav>
        </div>
    </header>
    <main class="container bg-white mx-auto flex-grow p-6 m-4 rounded-lg shadow-md">
        {{ $slot }}
    </main>
    <footer class="mt-auto bg-black py-4">
        <div class="container mx-auto text-center text-gray-50">
            &copy; {{ date('Y') }} User Portal. All rights reserved.
        </div>
    </footer>
</body>
</html>