{{-- resources/views/userPortal/index.blade.php --}}
<x-layout>
    <div class="items-center justify-between">
        <h1 class="font-semibold text-3xl text-gray-800 leading-tight">
            Welcome to the User Portal Home Page
        </h1>
        <p class="mt-4 text-gray-600">
            This is the home page of the User Portal. Use the navigation links above to explore more.
        </p>
    </div>
    <div class="mt-6 p-4 bg-white rounded-lg shadow-md">
        <h3 class="text-lg font-medium text-gray-900 mb-2">Getting Started</h3>
        <p class="text-gray-700">
            To get started, you can register for an account or log in if you already have one. Once logged in, you can access various features of the User Portal.
        </p>
    </div>
    <div class="mt-6 p-4 bg-white rounded-lg shadow-md">
        <h3 class="text-lg font-medium text-gray-900 mb-2">Features</h3>
        <ul class="list-disc list-inside text-gray-700">
            <li>View and manage your profile</li>
        </ul>
    </div>
</x-layout>