<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Flight;

class BookingController extends Controller
{
    /**
     * SIMPAN BOOKING & REDIRECT KE RIWAYAT
     */
    public function confirm(Request $request)
    {
        // 🔐 pastikan login (double safety)
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // ✅ validasi
        $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'name'      => 'required|string|max:255',
            'email'     => 'required|email',
            'phone'     => 'nullable|string',
            'note'      => 'nullable|string',
        ]);

        // 🔎 ambil flight
        $flight = Flight::findOrFail($request->flight_id);

        // 💾 simpan booking
        Booking::create([
            'user_id'     => Auth::id(),
            'flight_id'   => $flight->id,
            'name'        => $request->name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'note'        => $request->note,
            'total_price' => $flight->price,
            'status'      => 'pending', // nanti bisa paid
        ]);

        // 🚀 INI YANG KAMU MAU
        return redirect()
            ->route('bookings.history')
            ->with('success', 'Pemesanan berhasil dibuat!');
    }

    /**
     * RIWAYAT PEMESANAN USER
     */
    public function history()
    {
        $bookings = Booking::with('flight')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('bookings.history', compact('bookings'));
    }
}
