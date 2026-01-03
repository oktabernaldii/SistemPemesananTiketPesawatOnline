@extends('layouts.app')

@section('content')
    <div class="confirm-wrapper">
        <div class="confirm-grid">

            <!-- KIRI : RINGKASAN -->
            <div class="summary-card">
                <h3>Ringkasan Penerbangan</h3>

                <div class="summary-item">
                    <span>Maskapai</span>
                    {{ $flight->airline }} ({{ $flight->flight_code }})
                </div>

                <div class="summary-item">
                    <span>Rute</span>
                    {{ $flight->origin }} → {{ $flight->destination }}
                </div>

                <div class="summary-item">
                    <span>Tanggal & Waktu</span>
                    {{ $flight->departure_date }} · {{ $flight->departure_time }} - {{ $flight->arrival_time }}
                </div>

                <div class="summary-price">
                    Rp {{ number_format($flight->price, 0, ',', '.') }}
                </div>
            </div>

            <!-- KANAN : FORM -->
            <div class="form-card">
                <h3>Data Penumpang</h3>

                {{-- 🔥 SATU FORM SAJA --}}
                <form method="POST" action="{{ route('booking.confirm') }}">
                    @csrf

                    {{-- hidden --}}
                    <input type="hidden" name="flight_id" value="{{ $flight->id }}">

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label>No. HP (opsional)</label>
                        <input type="text" name="phone">
                    </div>

                    <div class="form-group">
                        <label>Catatan (opsional)</label>
                        <textarea name="note" rows="3"></textarea>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('flights.index') }}" class="back-link">
                            ← Kembali ke daftar penerbangan
                        </a>

                        <button type="submit" class="btn-confirm">
                            Konfirmasi & Lanjutkan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection