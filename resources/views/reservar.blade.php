<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reservar Consola</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Orbitron', sans-serif;
            margin: 0;
            padding: 0;
            background: #0f0f0f;
            color: #00ffea;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background: #1a1a1a;
            border-bottom: 2px solid #00ffea;
            box-shadow: 0 0 10px #00ffea;
            padding: 1.5rem 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: #00ffea;
            font-weight: bold;
            margin-right: 1.5rem;
            transition: color 0.2s ease;
        }

        .navbar a:hover {
            color: #00cfc3;
        }

        .dropdown-btn {
            cursor: pointer;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            background: transparent;
            border: 1px solid #00ffea;
            color: #00ffea;
            transition: background 0.3s ease;
        }

        .dropdown-btn:hover {
            background: #00ffea;
            color: #0f0f0f;
        }

        .dropdown-menu {
            background: #1a1a1a;
            border: 1px solid #00ffea;
            border-radius: 10px;
            box-shadow: 0 0 15px #00ffea;
            margin-top: 10px;
            padding: 0.5rem;
            min-width: 150px;
        }

        .dropdown-menu a, .dropdown-menu button {
            display: block;
            padding: 0.5rem;
            font-size: 0.9rem;
            color: #00ffea;
            border-radius: 6px;
            text-align: left;
            width: 100%;
        }

        .dropdown-menu a:hover, .dropdown-menu button:hover {
            background-color: #00ffea;
            color: #0f0f0f;
        }

        .container {
            max-width: 900px;
            margin: 4rem auto;
            padding: 2rem;
            flex: 1;
        }

        .section-title {
            font-size: 2rem;
            margin-bottom: 2rem;
            text-align: center;
            color: #00ffea;
            text-shadow: 0 0 10px #00ffea;
        }

        .console-card {
            background: #1a1a1a;
            border: 2px solid #00ffea;
            border-radius: 15px;
            box-shadow: 0 0 15px #00ffea;
            padding: 2rem;
            margin-bottom: 2rem;
        }

        label {
            display: block;
            margin-top: 1rem;
            color: #00ffea;
        }

        select, input[type="datetime-local"] {
            width: 100%;
            padding: 0.5rem;
            margin-top: 0.5rem;
            background: #0f0f0f;
            color: #00ffea;
            border: 1px solid #00ffea;
            border-radius: 10px;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .mt-10 {
            margin-top: 2.5rem;
        }

        .text-center {
            text-align: center;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 2rem;
        }

        .social-icons a {
            color: #00ffea;
            font-size: 2.5rem;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #00cfc3;
        }

        @keyframes glow {
            0% {
                box-shadow: 0 0 10px #00ffea, 0 0 20px #00ffea, 0 0 30px #00cfc3;
            }
            50% {
                box-shadow: 0 0 20px #00cfc3, 0 0 30px #00ffea, 0 0 40px #00ffea;
            }
            100% {
                box-shadow: 0 0 10px #00ffea, 0 0 20px #00ffea, 0 0 30px #00cfc3;
            }
        }

        footer {
            background: #1a1a1a;
            border-top: 2px solid #00ffea;
            text-align: center;
            font-size: 0.9rem;
            padding: 1rem;
            margin-top: auto;
            animation: glow 3s ease-in-out infinite;
        }

        .btn-secondary {
            display: inline-block;
            margin-top: 1rem;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="flex items-center space-x-6">
        <a href="{{ url('/dashboard') }}">Inicio</a>
        <a href="{{ route('quienes-somos') }}">Quiénes somos</a>
        <a href="{{ route('menu') }}">Menú</a>
        <a href="{{ route('reservar') }}">Reservar</a>
        <a href="{{ route('gestionar-consolas') }}">Gestionar</a>
    </div>

    <div class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="dropdown-btn">
            {{ Auth::user()->name }}
        </button>
        <div x-show="open" @click.away="open = false" x-transition class="dropdown-menu absolute right-0 mt-2 z-50">
            <a href="{{ route('profile.edit') }}">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Log Out</button>
            </form>
        </div>
    </div>
</nav>

<!-- Contenido -->
<div class="container">
    <h2 class="section-title">Reservar Consola</h2>

    @if ($userReservation)
        <div class="console-card">
            <p><strong>Consola reservada:</strong> {{ $userReservation->console->name }}</p>
            <p><strong>Hora de inicio:</strong> {{ \Carbon\Carbon::parse($userReservation->start_time)->format('H:i') }}</p>
            <p><strong>Hora de fin:</strong> {{ \Carbon\Carbon::parse($userReservation->end_time)->format('H:i') }}</p>
            <form method="POST" action="{{ route('reservas.cancel') }}">
                @csrf
                <button type="submit" class="dropdown-btn mt-4">Cancelar reserva</button>
            </form>
        </div>
    @else
        <form method="POST" action="{{ route('reservas.store') }}">
            @csrf
            <div class="console-card">
                <label for="console_id">Selecciona una consola:</label>
                <select name="console_id" id="console_id" required>
                    @foreach ($consoles as $console)
                        <option value="{{ $console->id }}">{{ $console->name }}</option>
                    @endforeach
                </select>

                <label for="start_time">Hora de inicio:</label>
                <input type="datetime-local" name="start_time" id="start_time" required>

                <label for="duration">Duración (máx. 4 horas):</label>
                <select name="duration" id="duration" required>
                    @for ($i = 1; $i <= 4; $i++)
                        <option value="{{ $i }}">{{ $i }} hora{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                </select>

                <button type="submit" class="dropdown-btn mt-4">Reservar</button>
            </div>
        </form>
    @endif

    <div class="mt-10 text-center">
        <a href="{{ route('reservas.agenda') }}" class="dropdown-btn btn-secondary">Ver Agenda</a>
    </div>
</div>

<!-- Footer -->
<footer>
    <div class="social-icons">
        <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-square"></i></a>
        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://wa.me/3022041901" target="_blank"><i class="fab fa-whatsapp"></i></a>
    </div>
    <p>© 2025 Tecnojuegos - Todos los derechos reservados</p>
</footer>

</body>
</html>
