@extends('layouts.app')

@section('content')

<div class="hero-overlay">
    <div class="form-wrapper">
        <div class="glass-form">

            <h2>✈️ Tambah Penerbangan</h2>
            <p>Masukkan data penerbangan baru</p>

            <form action="{{ route('flights.store') }}" method="POST" class="flight-form">
                @csrf

                <div class="grid-2">
                    <input type="text" name="airline" placeholder="Maskapai" required>
                    <input type="text" name="flight_code" placeholder="Kode Penerbangan" required>
                </div>

                <div class="grid-2">
                    <input type="text" name="origin" placeholder="Kota Asal (Kode Bandara)" required>
                    <input type="text" name="destination" placeholder="Kota Tujuan (Kode Bandara)" required>
                </div>

                <!-- DATE & TIME -->
                <div class="flight-datetime">
                    <input
                        type="text"
                        id="departure_date"
                        name="departure_date"
                        placeholder="Tanggal Berangkat"
                        required
                        readonly
                    >

                    <input
                        type="text"
                        id="departure_time"
                        name="departure_time"
                        placeholder="Jam Berangkat"
                        required
                        readonly
                    >

                    <input
                        type="text"
                        id="arrival_time"
                        name="arrival_time"
                        placeholder="Jam Tiba"
                        required
                        readonly
                    >
                </div>

                <div class="grid-2">
                    <input type="number" name="price" placeholder="Harga" required>

                    <button type="submit" class="btn-primary">
                        Simpan Penerbangan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    flatpickr("#departure_date", {
        dateFormat: "Y-m-d", // ✅ FORMAT DATABASE
        altInput: true,
        altFormat: "d M Y",  // 👀 TAMPILAN CANTIK
        minDate: "today",
    });

    flatpickr("#departure_time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
    });

    flatpickr("#arrival_time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
    });
</script>
@endpush
