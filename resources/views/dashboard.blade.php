@extends('layouts.app')

@section('title', 'Dashboard')
    
@section('content')
    <div class="dashboard-container">
        <h2>Dashboard Overview</h2>

        @auth
            @include('partials.user-profile', ['user' => auth()->guard()->user()])
        @else
            <h1>HI!</h1>
        @endauth
        

        @section('sidebar')
            @include('partials.sidebar')
        @endsection
    </div>
@endsection