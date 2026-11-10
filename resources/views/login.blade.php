@extends('layouts.app')

@section('title', 'Login | PeaKeep')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('content')

<div class="login-page">

    <div class="login-card">

        <div class="login-logo">
            <h1>PeaKeep</h1>
            <p>Pantry, Your Little World.</p>
        </div>

        <div class="login-heading">
            <h2>Welcome back!</h2>
            <p>Yuk, masuk ke akun PeaKeepmu!</p>
        </div>

        @if (session('loginError'))
            <div class="login-error">
                {{ session('loginError') }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST">

            @csrf

            <div class="form-group">
                <label for="username">Username</label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Enter your username"
                    value="{{ old('username') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >
            </div>

            <button type="submit" class="login-button">
                Sign In
            </button>

        </form>

        <p class="login-note">
            little little spicyyy
        </p>

    </div>

</div>

@endsection