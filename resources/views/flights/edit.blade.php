@extends('layouts.app')

@section('content')

<div class="hero-overlay">
    <div class="form-wrapper">
        <div class="glass-form">

            <h2>✏️ Edit Penerbangan</h2>
            <p>Perbarui data penerbangan</p>

            <form action="{{ route('flights.update', $flight->id) }}"
                  method="POST"
                  class="flight-form">

                @csrf
                @method('PUT')

                <div class="grid-2">
                    <input type="text" name="airline"
                           value="{{ old('airline', $flight->airline) }}"
                           required>

                    <input type="text" name="flight_code"
                           value="{{ old('flight_code', $flight->flight_code) }}"
                           required>
                </div>

                <div class="grid-2">
                    <input type="text" name="origin"
                           value="{{ old('origin', $flight->origin) }}"
                           required>

                    <input type="text" name="destination"
                           value="{{ old('destination', $flight->destination) }}"
                           required>
                </div>

                <div class="flight-datetime">
                    <input type="date" name="departure_date"
                           value="{{ old('departure_date', $flight->departure_date) }}"
                           required>

                    <input type="time" name="departure_time"
                           value="{{ old('departure_time', $flight->departure_time) }}"
                           required>

                    <input type="time" name="arrival_time"
                           value="{{ old('arrival_time', $flight->arrival_time) }}"
                           required>
                </div>

                <div class="grid-2">
                    <input type="number" name="price"
                           value="{{ old('price', $flight->price) }}"
                           required>

                    <button type="submit" class="btn-primary">
                        Update Penerbangan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection
