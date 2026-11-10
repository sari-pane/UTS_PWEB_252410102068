
@extends('layouts.app')

@section('title', 'Beranda | PeaKeep')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</div>
@endpush

@section('content')

<x-navbar
    :nama="$nama"
    :username="$username"
/>

<div class="dashboard-page">


    <!-- WELCOME -->
    <section class="welcome-section">

        <div class="welcome-text">
            <p class="section-label">YOUR LITTLE PANTRY JOURNAL</p>

            <h1>
                Halo, {{ $nama }}!
                <br>
                <span>Let's make food last a little longer.</span>
            </h1>

            <p class="welcome-description">
                Selamat datang kembali! Yuk, perhatikan dan rawat makananmu hari ini, kurangi fast food!
            </p>

            <div class="welcome-tag">
                A LITTLE SPACE TO CARE
            </div>
        </div>

        <div class="welcome-date">
            <span class="date-label">TODAY IS</span>
            <h2>{{ $today }}</h2>
            <p>{{ $month }}</p>
        </div>

        <div class="welcome-food-decoration" aria-hidden="true">
            🥛
        </div>

    </section>



    <!-- PANTRY OVERVIEW -->
    <section class="overview-section">

        <div class="section-heading">
            <div>
                <p class="section-label">A QUICK LOOK</p>
                <h2>Your Pantry Overview</h2>
            </div>

            <span class="section-note">♡</span>
        </div>

        
<div class="overview-container">

    @foreach ($overview as $index => $item)

        <div class="overview-item">

            <div class="overview-top">
                <span class="overview-number">
                    0{{ $index + 1 }}
                </span>

                @if ($index == 0)
                    <span class="overview-icon">🥫</span>
                @elseif ($index == 1)
                    <span class="overview-icon">🥬</span>
                @else
                    <span class="overview-icon">🍞</span>
                @endif
            </div>

            <p class="overview-title">
                {{ $item['title'] }}
            </p>

            <h2>{{ $item['total'] }}</h2>

            <p class="overview-description">
                {{ $item['description'] }}
            </p>

        </div>

    @endforeach

</div>


    </section>


    <!-- JOURNAL -->
    <section class="journal-container">

        <div class="quote-card">

            <p class="section-label">A LITTLE NOTE FROM SARI</p>

            <div class="quote-mark">“</div>

            <blockquote>
                {{ $quote }}
            </blockquote>

            <p class="quote-footer">
                A LITTLE REMINDER TO YOURSELF
            </p>
        </div>


        <div class="reminder-card">

            <p class="section-label">DAILY REMINDER</p>

            <h2>Hey, don't forget!</h2>

            <p>{{ $reminder }}</p>

            <div class="reminder-decoration">
                PEAKeep · DAILY NOTE
            </div>
        </div>

    </section>


    <!-- NEEDS YOUR ATTENTION -->
    <section class="attention-section">

        <div class="section-heading">
            <div>
                <p class="section-label">A LITTLE PANTRY CHECK</p>
                <h2>Food That Needs You</h2>
            </div>

            <span class="section-note">♡</span>
        </div>

        <p class="attention-description">
            Beberapa persediaan makanan perlu kamu cek kembali.
            Hayolo, jangan sampai ada yang terbuang sia-sia ya!
        </p>

        <div class="food-container">

            @foreach ($attentionFoods as $food)

                <div class="food-card">

                    <div class="food-photo">
                        <img
                            src="{{ asset('foods/' . $food['gambar']) }}"
                            alt="{{ $food['nama'] }}"
                        >
                    </div>

                    <div class="food-details">

                        <p class="food-category">
                            {{ $food['kategori'] }}
                        </p>

                        <h3>{{ $food['nama'] }}</h3>

                        <div class="food-quantity">
                            {{ $food['jumlah'] }} {{ $food['satuan'] }}
                        </div>

                        <span class="food-status
                            @if ($food['status'] == 'Segera Habis')
                                status-low
                            @elseif ($food['status'] == 'Habis')
                                status-empty
                            @else
                                status-available
                            @endif
                        ">
                            {{ $food['status'] }}
                        </span>

                        <p class="food-expiry">
                            {{ $food['status_kedaluwarsa'] }}
                        </p>

                    </div>

                    <span class="food-decoration" aria-hidden="true">!</span>

                </div>


            @endforeach

        </div>

    </section>

</div>

@endsection
