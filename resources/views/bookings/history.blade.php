@extends('layouts.app')

@section('content')
<div class="booking-history">

    <h1 class="history-title">✈️ Riwayat Pemesanan Saya</h1>

    @if($bookings->isEmpty())
        <div class="empty-state">
            <p>Belum ada pemesanan tiket.</p>
            <a href="{{ route('flights.index') }}" class="btn-primary">
                Cari Penerbangan
            </a>
        </div>
    @else
        <div class="booking-list">
            @foreach($bookings as $booking)
                <div class="booking-card">

                    <div class="booking-header">
                        <div>
                            <h3>{{ $booking->flight->airline }}</h3>
                            <p class="route">
                                {{ $booking->flight->origin }} → {{ $booking->flight->destination }}
                            </p>
                        </div>

                        <span class="status-badge {{ $booking->status }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>

                    <div class="booking-body">
                        <div class="info">
                            <span>Tanggal</span>
                            <strong>{{ $booking->flight->departure_date }}</strong>
                        </div>

                        <div class="info">
                            <span>Jam</span>
                            <strong>
                                {{ $booking->flight->departure_time }} - {{ $booking->flight->arrival_time }}
                            </strong>
                        </div>

                        <div class="info">
                            <span>Total</span>
                            <strong class="price">
                                Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                            </strong>
                        </div>
                    </div>

                    <div class="booking-footer">
                        @if($booking->status === 'pending')
                            <a href="#" class="btn-pay">
                                Bayar Sekarang
                            </a>
                        @endif

                        <a href="#" class="btn-detail">
                            Detail
                        </a>
                    </div>

                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
