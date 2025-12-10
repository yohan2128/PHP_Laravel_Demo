<x-layout>
    <div class="items-center justify-between">
        <h1 class="font-semibold text-3xl text-gray-800 leading-tight">
            User Profile
        </h1>
        <p class="mt-4 text-gray-600">
            View and manage your user profile information here.
        </p>
        <div class="user-profile-card">
            <img src="{{ $user->avatar ?? 'default-avatar.png' }}" alt="Avatar">
            <h3>{{ $user->name }}</h3>
            <p>Email: {{ $user->email }}</p>
        </div>
        <div class="mt-6 p-4 bg-white rounded-lg shadow-md">
            <h3 class="text-lg font-medium text-gray-900 mb-2">Profile Details</h3>
            <p class="text-gray-700">
                Here you can update your profile information such as your name, email, and avatar.
            </p>
            <ul class="list-disc list-inside text-gray-700 mt-4">
                <li>Update your personal information</li>
                <li>Change your password</li>
                <li>Manage your avatar</li>
            </ul>
        </div>
    </div>
</x-layout>
