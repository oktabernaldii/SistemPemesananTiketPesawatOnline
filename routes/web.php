<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard.index');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->middleware('auth')->name('logout');

/*
|--------------------------------------------------------------------------
| FLIGHTS PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/flights', [FlightController::class, 'index'])
    ->name('flights.index');

/*
|--------------------------------------------------------------------------
| ADMIN ONLY
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/flights/create', [FlightController::class, 'create'])
        ->name('flights.create');

    Route::post('/flights', [FlightController::class, 'store'])
        ->name('flights.store');

    Route::get('/flights/{flight}/edit', [FlightController::class, 'edit'])
        ->name('flights.edit');

    Route::put('/flights/{flight}', [FlightController::class, 'update'])
        ->name('flights.update');

    Route::delete('/flights/{flight}', [FlightController::class, 'destroy'])
        ->name('flights.destroy');
});

/*
|--------------------------------------------------------------------------
| USER AUTH
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/flights/{flight}/order', [FlightController::class, 'order'])
        ->name('flights.order');

    Route::get('/flights/{flight}/confirm', [FlightController::class, 'confirm'])
        ->name('flights.confirm');

    Route::post('/booking/confirm', [BookingController::class, 'confirm'])
        ->name('booking.confirm');

    Route::post('/flights/{flight}/pay', [FlightController::class, 'pay'])
        ->name('flights.pay');

    Route::get('/payment/{booking}', [FlightController::class, 'payment'])
        ->name('flights.payment');

    Route::get('/my-bookings', [BookingController::class, 'history'])
        ->name('bookings.history');
});

/*
|--------------------------------------------------------------------------
| FLIGHT DETAIL (PALING BAWAH!)
|--------------------------------------------------------------------------
*/
Route::get('/flights/{flight}', [FlightController::class, 'show'])
    ->name('flights.show');


Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/bookings', [BookingController::class, 'adminIndex'])
        ->name('admin.bookings.index');
});
