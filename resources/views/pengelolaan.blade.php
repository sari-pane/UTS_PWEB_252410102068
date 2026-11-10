
@extends('layouts.app')

@section('title', 'My Pantry | PeaKeep')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pantry.css') }}">
@endpush

@section('content')

<x-navbar
    :nama="$nama"
    :username="$username"
/>

<div class="pantry-page">

    <!-- PAGE HEADER -->
    <section class="welcome-section">

        <div class="welcome-text">
            <p class="section-label">YOUR PERSONAL FOOD STORAGE</p>

            <h1>
                My Pantry
                <br>
                <span>Everything in its place.</span>
            </h1>

            <p class="welcome-description">
                Kelola dan pantau seluruh persediaan makananmu
                agar tetap teratur dan mudah ditemukan.
            </p>
        </div>

        <div class="welcome-date">
            <span>MY PANTRY</span>
            <h2>{{ count($foods) }}</h2>
            <p>Food Items</p>
        </div>

    </section>

    <!-- FOOD LIST SECTION -->
    <section class="attention-section">

        <div class="section-heading">
            <div>
                <p class="section-label">YOUR COLLECTION</p>
                <h2>Daftar Persediaan</h2>
            </div>

            <span class="section-note">
                Your little food collection
            </span>
        </div>

        <p class="attention-description">
            Berikut seluruh makanan yang tersimpan saat ini.
        </p>

        <!-- FOOD CONTAINER -->
        <div class="food-container">

            @foreach ($foods as $food)

                <div class="food-card">

                    <!-- FOOD PHOTO -->
                    <div class="food-photo">
                        <img
                            src="{{ asset('foods/' . $food['gambar']) }}"
                            alt="{{ $food['nama'] }}"
                        >
                    </div>

                    <!-- FOOD DETAILS -->
                    <div class="food-details">

                        <p class="food-category">
                            {{ $food['kategori'] }}
                        </p>

                        <h3>{{ $food['nama'] }}</h3>

                        <div class="food-quantity">
                            {{ $food['jumlah'] }} {{ $food['satuan'] }}
                        </div>

                        <!-- STOCK STATUS -->
                        <span class="food-status
                            @if ($food['status'] == 'Tersedia')
                                status-available
                            @elseif ($food['status'] == 'Segera Habis')
                                status-low
                            @else
                                status-empty
                            @endif
                        ">
                            {{ $food['status'] }}
                        </span>

                        <!-- EXPIRY DATE -->
                        <div class="pantry-expiry">
                            <span>Kedaluwarsa:</span>

                            <strong>
                                {{ date('d F Y', strtotime($food['tanggal_kedaluwarsa'])) }}
                            </strong>
                        </div>

                        <!-- EXPIRY STATUS -->
                        <p class="food-expiry">
                            {{ $food['status_kedaluwarsa'] }}
                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    </section>

</div>

@endsection
