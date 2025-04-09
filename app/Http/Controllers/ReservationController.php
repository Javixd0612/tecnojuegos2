<?php

namespace App\Http\Controllers;

use App\Models\Console;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReservationController extends Controller
{
    // Mostrar la vista principal de reservas
    public function index()
{
    $consoles = Console::all();
    $userReservation = Reservation::where('user_id', Auth::id())
        ->where('end_time', '>', now())
        ->first();

    // Cambiamos la vista que retorna:
    return view('reservar', compact('consoles', 'userReservation'));
}


    // Guardar una nueva reserva
public function store(Request $request)
{
    $request->validate([
        'console_id' => 'required|exists:consoles,id',
        'start_time' => 'required|date|after_or_equal:now',
        'duration' => 'required|integer|min:1|max:4',
    ]);

    $start = Carbon::parse($request->start_time);
    $duration = (int) $request->duration;
    $end = $start->copy()->addHours($duration);

    $overlap = Reservation::where('console_id', $request->console_id)
        ->where(function ($query) use ($start, $end) {
            $query->whereBetween('start_time', [$start, $end])
                ->orWhereBetween('end_time', [$start, $end])
                ->orWhere(function ($q) use ($start, $end) {
                    $q->where('start_time', '<=', $start)
                      ->where('end_time', '>=', $end);
                });
        })
        ->exists();

    if ($overlap) {
        return back()->with('error', 'Ese horario ya está ocupado para esa consola.');
    }

    $hasReservation = Reservation::where('user_id', auth()->id())
        ->where('end_time', '>', now())
        ->exists();

    if ($hasReservation) {
        return back()->with('error', 'Ya tienes una reserva activa.');
    }

    Reservation::create([
        'user_id' => auth()->id(),
        'console_id' => $request->console_id,
        'start_time' => $start,
        'end_time' => $end,
    ]);

    return back()->with('success', 'Reserva realizada con éxito.');
}


    // Cancelar reserva activa
    public function cancel()
    {
        $reservation = Reservation::where('user_id', Auth::id())
            ->where('end_time', '>', now())
            ->first();

        if ($reservation) {
            $reservation->delete();
            return back()->with('success', 'Reserva cancelada.');
        }

        return back()->with('error', 'No tienes reservas activas para cancelar.');
    }

    public function agenda()
{
    $reservations = Reservation::with(['console', 'user'])->orderBy('start_time')->get();
    return view('agenda', compact('reservations')); // 👈 SIN "reservas."
}

}

