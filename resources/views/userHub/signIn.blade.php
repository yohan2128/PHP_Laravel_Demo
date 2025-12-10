<x-layout>
    <h1 class="font-semibold text-3xl text-gray-800 leading-tight" > Sign In to your Account</h1>
    <div class="mt-6 p-4 bg-white rounded-lg shadow-md">
        <form method="POST" action="{{ route('userHub.signInAuth') }}">
            @csrf
            <div class="mb-4">
                <label for="emailUser" class="block text-gray-700 font-medium mb-2">Email or User</label>
                <input type="emailUser" id="emailUser" name="emailUser" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <button type="submit" class="bg-violet-700 text-white px-4 py-2 rounded-lg hover:bg-violet-600">Sign In</button>
        </form>
    </div>
</x-layout>