<div class="user-profile-card">
    <img src="{{ $user->avatar ?? 'default-avatar.png' }}" alt="Avatar">
    <h3>{{ $user->name }}</h3>
    <p>Email: {{ $user->email }}</p>
</div>
