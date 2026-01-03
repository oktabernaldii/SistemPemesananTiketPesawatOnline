@extends('layouts.app')

@section('content')
<div class="payment-wrapper">
    <div class="payment-card">
        <h2>Pembayaran</h2>

        <p><strong>Nama:</strong> {{ $booking->name }}</p>
        <p><strong>Email:</strong> {{ $booking->email }}</p>
        <p><strong>Maskapai:</strong> {{ $booking->flight->airline }}</p>
        <p><strong>Rute:</strong> {{ $booking->flight->origin }} → {{ $booking->flight->destination }}</p>

        <h3>Total: Rp {{ number_format($booking->total_price,0,',','.') }}</h3>

        <button class="btn-pay">
            ✅ Bayar Sekarang (Dummy)
        </button>
    </div>
</div>
@endsection
