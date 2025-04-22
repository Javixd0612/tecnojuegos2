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

use App\Http\Controllers\ConsolaController;

Route::middleware(['auth'])->group(function () {
    Route::get('/gestionar-consolas', [ConsolaController::class, 'index'])->name('gestionar-consolas');
    Route::post('/consolas', [ConsolaController::class, 'store'])->name('consolas.store');
    Route::put('/consolas/{id}', [ConsolaController::class, 'update'])->name('consolas.update');
    Route::delete('/consolas/{id}', [ConsolaController::class, 'destroy'])->name('consolas.destroy');
    
});

// Ruta para editar consola
Route::get('/consolas/{id}/edit', [ConsolaController::class, 'edit'])->name('consolas.edit');

// Rutas para el resto de acciones CRUD
Route::resource('consolas', ConsolaController::class);

Route::get('consolas/{id}/edit', [ConsolaController::class, 'edit'])->name('consolas.edit');


Route::resource('consolas', ConsolaController::class);

Route::get('/consolas/{id}/edit', [ConsolaController::class, 'edit'])->name('consolas.edit');

// Ruta para actualizar consola
Route::put('/consolas/{id}', [ConsolaController::class, 'update'])->name('consolas.update');

Route::get('/gestionar-consolas', [ConsolaController::class, 'index'])->name('gestionar-consolas');
Route::post('/consolas', [ConsolaController::class, 'store'])->name('consolas.store');
Route::get('/consolas/{id}/edit', [ConsolaController::class, 'edit'])->name('consolas.edit');
Route::put('/consolas/{id}', [ConsolaController::class, 'update'])->name('consolas.update');
Route::delete('/consolas/{id}', [ConsolaController::class, 'destroy'])->name('consolas.destroy');

require __DIR__.'/auth.php';
