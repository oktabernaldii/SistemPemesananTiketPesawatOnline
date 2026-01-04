@extends('layouts.app')

@section('content')

<section class="hero-flights">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>📋 Kelola Pesanan</h1>
        <p>Daftar Pesanan User</p>
    </div>
</section>

<section class="flight-content">
    <div class="table-card">

        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Maskapai</th>
                    <th>Rute</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->flight->airline }}</td>
                        <td>{{ $booking->flight->origin }} → {{ $booking->flight->destination }}</td>
                        <td>{{ $booking->flight->departure_date }}</td>
                        <td>Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge {{ $booking->status }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty">
                            Belum ada pesanan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</section>

@endsection
