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

            <!-- HEADER ACTION -->
            <div class="table-header">
                <div class="flight-actions">

                    {{-- TOMBOL TAMBAH (ADMIN ONLY) --}}
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('flights.create') }}" class="btn-add">
                                + Tambah Penerbangan
                            </a>
                        @endif
                    @endauth

                    {{-- RIWAYAT PESANAN (USER & ADMIN) --}}
                    @auth
                        <a href="{{ route('bookings.history') }}" class="btn-history">
                            📄 Riwayat Pesanan
                        </a>
                    @endauth

                </div>
            </div>

            <!-- TABLE -->
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

                                {{-- PESAN (SEMUA USER LOGIN) --}}
                                <form action="{{ route('flights.show', $flight->id) }}" method="GET" style="display:inline;">
                                    <button type="submit" class="btn success">
                                        Pesan
                                    </button>
                                </form>

                                {{-- EDIT & HAPUS (ADMIN ONLY) --}}
                                @auth
                                    @if(auth()->user()->isAdmin())

                                        <form action="{{ route('flights.edit', $flight->id) }}" method="GET" style="display:inline;">
                                            <button type="submit" class="btn warning">
                                                Edit
                                            </button>
                                        </form>

                                        <form action="{{ route('flights.destroy', $flight->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn danger"
                                                onclick="return confirm('Yakin ingin menghapus penerbangan ini?')">
                                                Hapus
                                            </button>
                                        </form>

                                    @endif
                                @endauth

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
