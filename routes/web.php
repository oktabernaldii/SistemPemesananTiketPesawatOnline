<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA & DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard.index');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| AUTH (LOGIN / REGISTER)
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'loginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerForm'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

/*
|--------------------------------------------------------------------------
| FLIGHTS (TIKET)
|--------------------------------------------------------------------------
*/
Route::get('/flights', [FlightController::class, 'index'])
    ->name('flights.index');

Route::get('/flights/create', [FlightController::class, 'create'])
    ->name('flights.create');

Route::post('/flights', [FlightController::class, 'store'])
    ->name('flights.store');

Route::get('/flights/{flight}', [FlightController::class, 'show'])
    ->name('flights.show');

Route::get('/flights/{flight}/edit', [FlightController::class, 'edit'])
    ->name('flights.edit');

Route::put('/flights/{flight}', [FlightController::class, 'update'])
    ->name('flights.update');

Route::delete('/flights/{flight}', [FlightController::class, 'destroy'])
    ->name('flights.destroy');

/*
|--------------------------------------------------------------------------
| ORDER & KONFIRMASI
|--------------------------------------------------------------------------
*/

/* halaman order (GET) */
Route::get('/flights/{flight}/order', [FlightController::class, 'order'])
    ->name('flights.order');

/* halaman konfirmasi (GET) — BOLEH DIAKSES TANPA LOGIN */
Route::get('/flights/{flight}/confirm', [FlightController::class, 'confirm'])
    ->name('flights.confirm');

/*
|--------------------------------------------------------------------------
| AKSI KONFIRMASI BOOKING (POST) — WAJIB LOGIN
|--------------------------------------------------------------------------
| Tombol "Konfirmasi" HARUS submit ke route ini
*/
Route::post('/booking/confirm', [BookingController::class, 'confirm'])
    ->middleware('auth')
    ->name('booking.confirm');

/*
|--------------------------------------------------------------------------
| PAYMENT
|--------------------------------------------------------------------------
*/
Route::post('/flights/{flight}/pay', [FlightController::class, 'pay'])
    ->middleware('auth')
    ->name('flights.pay');

Route::get('/payment/{booking}', [FlightController::class, 'payment'])
    ->middleware('auth')
    ->name('flights.payment');

/*
|--------------------------------------------------------------------------
| RIWAYAT PESANAN
|--------------------------------------------------------------------------
*/
Route::get('/my-bookings', [BookingController::class, 'history'])
    ->middleware('auth')
    ->name('bookings.history');
