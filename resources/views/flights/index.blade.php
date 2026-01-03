@extends('layouts.app')

@section('content')

    <!-- HERO -->
    <section class="hero-flights">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>✈️ Daftar Penerbangan</h1>
            <p>Temukan penerbangan terbaik dengan harga terbaik</p>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="flight-content">
        <div class="table-card">

            <div class="table-header">
                <div class="flight-actions">
                    <a href="{{ route('flights.create') }}" class="btn-add">
                        + Tambah Penerbangan
                    </a>

                    @auth
                        <a href="{{ route('bookings.history') }}" class="btn-history">
                            📄 Riwayat Pesanan
                        </a>
                    @endauth
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Maskapai</th>
                        <th>Kode</th>
                        <th>Rute</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($flights as $flight)
                        <tr>
                            <td>{{ $flight->airline }}</td>
                            <td>{{ $flight->flight_code }}</td>
                            <td>{{ $flight->origin }} → {{ $flight->destination }}</td>
                            <td>{{ $flight->departure_date }}</td>
                            <td>{{ $flight->departure_time }} - {{ $flight->arrival_time }}</td>
                            <td>Rp {{ number_format($flight->price, 0, ',', '.') }}</td>
                            <td class="actions">
                                <form action="{{ route('flights.show', $flight->id) }}" method="GET" style="display:inline;">
                                    <button type="submit" class="btn success">
                                        Pesan
                                    </button>
                                </form>

                                <form action="{{ route('flights.edit', $flight->id) }}" method="GET" style="display:inline;">
                                    <button type="submit" class="btn warning">
                                        Edit
                                    </button>
                                </form>


                                <form action="{{ route('flights.destroy', $flight->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn danger btn-delete">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty">
                                Belum ada penerbangan tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </section>

@endsection