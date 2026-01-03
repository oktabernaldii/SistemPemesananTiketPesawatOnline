@extends('layouts.app')

@section('content')
    <div class="hero-overlay">

        <div class="show-wrapper">

            <div class="show-card">

                <h2 class="show-title">
                    {{ $flight->airline }} - {{ $flight->flight_code }}
                </h2>

                <p class="show-route">
                    {{ $flight->origin }} → {{ $flight->destination }}
                </p>

                <div class="show-info">
                    <p><strong>Berangkat:</strong> {{ $flight->departure_time }}</p>
                    <p><strong>Tiba:</strong> {{ $flight->arrival_time }}</p>
                </div>

                <div class="show-price">
                    Rp {{ number_format($flight->price, 0, ',', '.') }}
                </div>

                <a href="{{ route('flights.confirm', $flight->id) }}" class="btn-order">
                    ✈️ Pesan Sekarang
                </a>

            </div>

        </div>

    </div>
@endsection