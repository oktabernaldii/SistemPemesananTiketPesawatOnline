@extends('layouts.app')

@section('content')
    <section class="hero">
        <h1 class="hero-title">
            Pilihan Utama Untuk <span>Jelajahi Dunia</span>
        </h1>
        <p class="hero-subtitle">
            Temukan Perjalanan Terbaikmu Bersama TravelOkta
        </p>
    </section>


    <section class="services">
        <a href="{{ route('flights.index') }}" class="service">
            ✈️ Tiket Pesawat
        </a>

        <a href="" class="service">
            🏨 Hotel
        </a>

        <a href="" class="service">
            🚗 Rental Mobil
        </a>
    </section>

    <div class="search-bar-wrapper">
        <form class="search-bar">

            <!-- DARI -->
            <div class="search-field">
                <label>Dari</label>
                <input type="text" placeholder="ASAL">
            </div>

            <!-- KE -->
            <div class="search-field">
                <label>Ke</label>
                <input type="text" placeholder="TUJUAN">
            </div>

            <!-- TANGGAL -->
            <div class="search-field">
                <label>Tanggal Pergi</label>
                <input type="text" id="search_date" placeholder="Pilih tanggal" readonly>
            </div>

            <!-- BUTTON -->
            <button type="submit" class="search-btn">
                Cari Tiket
            </button>

        </form>
    </div>
    @push('scripts')
        <script>
            flatpickr("#search_date", {
                dateFormat: "d M Y",
                minDate: "today",
            });
        </script>
    @endpush

@endsection