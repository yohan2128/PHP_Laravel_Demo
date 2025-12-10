<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Portal</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-200 min-h-screen flex flex-col" x-data="{ sidebarToggle: false }">
    <header class="bg-black shadow" x-data="{ open: false }">
        <div class="container mx-auto p-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="{{ route('userHub.index') }}">
                    <h1 class="text-3xl font-bold text-violet-700">User Portal</h1>
                </a>

                <!-- Burger button (mobile only) -->
                <button class="hamburger md:hidden text-gray-50 focus:outline-none"
                    :class="{'active': sidebarToggle }" @click="sidebarToggle = !sidebarToggle">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

            <!-- Nav -->
            <nav :class="{'block': open, 'hidden': !open}" 
                class="hidden md:flex md:items-center md:justify-between mt-4">
                <ul class="flex flex-col md:flex-row md:space-x-10 items-center text-base font-medium">
                    <li>
                        <a href="{{ route('userHub.index') }}"
                        class="text-gray-50 hover:text-violet-600">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('userHub.showAbout') }}"
                        class="text-gray-50 hover:text-violet-600">About</a>
                    </li>
                </ul>
                
                <div class="flex flex-col md:flex-row md:items-center md:space-x-4 mt-4 md:mt-0">
                    @auth
                        <span class="font-bold text-violet-700">Welcome {{ auth()->guard()->user()->name }}!</span>
                        <form action="{{ route('userHub.signOut') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-50 hover:text-red-600 underline">Log out</button>
                        </form>
                    @else
                        <a class="text-gray-50 hover:text-violet-600" href="{{ route('userHub.showSignIn') }}">Sign In</a>
                        <a class="text-gray-50 hover:text-violet-600" href="{{ route('userHub.showSignUp') }}">Sign Up</a>
                    @endauth
                </div>
            </nav>
        </div>
    </header>
    <!-- Sidebar (mobile only) -->
    <aside id="sidebar" class="bg-black text-gray-50 w-64 h-screen fixed top-0 left-0 p-6 shadow-lg z-50 md:hidden" 
        :class="[sidebarToggle ? 'block' : 'hidden']" @.click.outside="sidebarToggle = false">

        <!-- Sidebar content goes here -->
        <div class="text-gray-700 overflow-y-auto h-full
        srollbar-y scrollbar-thin scrollbar-track-transparent scrollbar-thumb-gray-400">
            
            <ul class="space-y-2 flex flex-col text-base font-medium">
                <li><a href="{{ route('userHub.index') }}"
                        class="text-gray-50 hover:text-violet-600">Home</a></li>
                <li><a href="{{ route('userHub.showAbout') }}"
                        class="text-gray-50 hover:text-violet-600">About</a></li>
                @auth
                        <li><span class="font-bold text-violet-700">Welcome {{ auth()->guard()->user()->name }}!</span>
                        <form action='{{ route('userHub.signOut') }}' method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-50 hover:text-red-600 underline">Log out</button>
                        </form></li>
                    @else
                        <li><a href="{{ route('userHub.showSignIn') }}" 
                                class="text-gray-50 hover:text-violet-600" >Sign In</a></li>
                        <li><a href="{{ route('userHub.showSignUp') }}"
                            class="text-gray-50 hover:text-violet-600">Sign Up</a></li>
                    @endauth
            </ul>
        </div>
    </aside>
    <main class="container bg-white mx-auto flex-grow p-6 m-4 rounded-lg shadow-md 
    scrollbar-y scrollbar-thin scrollbar-track-transparent scrollbar-thumb-gray-400">
        {{ $slot }}
    </main>
    <footer class="mt-auto bg-black py-4">
        <div class="container mx-auto text-center text-gray-50">
            &copy; {{ date('Y') }} User Portal. All rights reserved.
        </div>
    </footer>
</body>
</html>