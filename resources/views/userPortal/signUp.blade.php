<x-layout>
    <hi class="font-semibold text-3xl text-gray-800 leading-tight">Create an Account</h1>
    @if ($errors->any())
        <div class="mt-6 p-4 bg-red-100 rounded-lg shadow-md text-red-700 text-base">
            <h3 class="font-medium mb-2">There were some problems with your input:</h3>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mt-6 p-4 bg-white rounded-lg shadow-md text-base">
        <form method="POST" action="/register">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <button type="submit" class="bg-violet-700 text-white px-4 py-2 rounded-lg hover:bg-violet-600">Sign Up</button>
        </form>
    </div>
</x-layout>