<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Booking;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::latest()->get();
        return view('flights.index', compact('flights'));
    }

    public function create()
    {
        return view('flights.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'airline' => 'required',
            'flight_code' => 'required',
            'origin' => 'required',
            'destination' => 'required',
            'departure_date' => 'required|date',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'price' => 'required|numeric',
        ]);

        Flight::create($request->all());

        return redirect()
            ->route('flights.index')
            ->with('success', 'Penerbangan berhasil ditambahkan');
    }

    public function show(Flight $flight)
    {
        return view('flights.show', compact('flight'));
    }

    public function book(Request $request, Flight $flight)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $booking = Booking::create([
            'flight_id' => $flight->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'total_price' => $flight->price,
        ]);

        return redirect()->route('flights.payment', $booking->id);
    }

    public function edit(Flight $flight)
    {
        return view('flights.edit', compact('flight'));
    }

    public function update(Request $request, Flight $flight)
    {
        $request->validate([
            'airline' => 'required',
            'flight_code' => 'required',
            'origin' => 'required',
            'destination' => 'required',
            'departure_date' => 'required|date',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'price' => 'required|numeric',
        ]);

        $flight->update($request->all());

        return redirect()
            ->route('flights.index')
            ->with('success', 'Penerbangan berhasil diperbarui');
    }

    public function destroy(Flight $flight)
    {
        $flight->delete();

        return redirect()
            ->route('flights.index')
            ->with('success', 'Penerbangan berhasil dihapus');
    }

    public function payment(Booking $booking)
    {
        return view('flights.payment', compact('booking'));
    }

    public function confirm(Flight $flight)
    {
        return view('flights.confirm', compact('flight'));
    }

    public function pay(Request $request, Flight $flight)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        // sementara kita anggap sukses
        return redirect()
            ->route('flights.index')
            ->with('success', 'Pembayaran berhasil!');
    }
}
