<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/quienes-somos', function () {
    return view('quienes-somos');
})->middleware(['auth'])->name('quienes-somos');

use App\Http\Controllers\ReservationController;

Route::middleware(['auth'])->group(function () {
    Route::get('/reservar', [ReservationController::class, 'index'])->name('reservar');
    Route::post('/reservar', [ReservationController::class, 'store'])->name('reservas.store');
    Route::post('/reservar/cancelar', [ReservationController::class, 'cancel'])->name('reservas.cancel');
    Route::get('/agenda', [ReservationController::class, 'agenda'])->name('reservas.agenda');
});

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::post('/reservar', [ReservationController::class, 'store'])->name('reservas.store');

Route::get('/agenda', [ReservationController::class, 'agenda'])->name('reservas.agenda');


require __DIR__.'/auth.php';
