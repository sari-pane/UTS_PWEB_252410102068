
@extends('layouts.app')

@section('title', 'My Profile | PeaKeep')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@section('content')

<x-navbar
    :nama="$nama"
    :username="$username"
/>

<div class="profile-page">

    <!-- PROFILE HEADER -->
    <section class="welcome-section">

        <div class="welcome-text">

            <p class="section-label">YOUR PERSONAL SPACE</p>

            <h1>
                My Profile
                <br>
                <span>A little space about you.</span>
            </h1>

            <p class="welcome-description">
                Yuk, kenali informasi akun PeaKeepmu!
            </p>

        </div>

        <div class="welcome-date">
            <span>MEMBER</span>
            <h2>PK</h2>
            <p>PeaKeep User</p>
        </div>

    </section>

    <!-- PROFILE INFORMATION -->
    <section class="profile-section">

        <div class="section-heading">

            <div>
                <p class="section-label">ACCOUNT DETAILS</p>
                <h2>Informasi Akun</h2>
            </div>

            <span class="section-note">
                Identitas mungilmu inii
            </span>

        </div>

        <div class="profile-card">

            <div class="profile-avatar">
                {{ strtoupper(substr($nama, 0, 1)) }}
            </div>

            <div class="profile-welcome">
                <h3>{{ $nama }}</h3>
                <p>Welcome to your little pantry world.</p>
            </div>

            <div class="profile-info">

                <span>Nama Lengkap</span>

                <strong>{{ $nama }}</strong>

            </div>

            <div class="profile-info">

                <span>Username</span>

                <strong>{{ '@' . $username }}</strong>

            </div>

            <div class="profile-note">
                <p>Thank you for being part of PeaKeep.</p>
            </div>

        </div>

    </section>

</div>

@endsection
