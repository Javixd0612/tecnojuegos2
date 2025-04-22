<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda - Tecnojuegos</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: 'Orbitron', sans-serif;
            background: #0f0f0f;
            color: #00ffea;
            margin: 0;
            padding: 0;
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
            position: relative;
            z-index: 10;
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

        .navbar .navbar-links {
            display: flex;
            gap: 1.5rem;
        }

        .content-wrapper {
            flex: 1;
            padding: 3rem 2rem;
            display: flex;
            flex-direction: column;
            gap: 3rem;
            align-items: center;
            justify-content: center;
        }

        .section-container {
            width: 100%;
            max-width: 900px;
            background: #1a1a1a;
            border: 2px solid #00ffea;
            border-radius: 20px;
            box-shadow: 0 0 20px #00ffea;
            padding: 2rem;
            text-align: center;
        }

        .section-container h2 {
            color: #ffffff;
            text-shadow: 0 0 10px #00ffea;
            margin-bottom: 1rem;
        }

        .section-container p {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .reservation-table {
            width: 100%;
            margin-top: 2rem;
            border-collapse: collapse;
        }

        .reservation-table th,
        .reservation-table td {
            padding: 1rem;
            border: 1px solid #00ffea;
            text-align: center;
        }

        .reservation-table th {
            background: #1a1a1a;
            color: #00ffea;
        }

        .reservation-table td {
            background: #0f0f0f;
            color: #ffffff;
        }

        .reservation-table tr:hover {
            background: #00ffea;
            color: #0f0f0f;
        }

        footer {
            background: #1a1a1a;
            border-top: 2px solid #00ffea;
            text-align: center;
            font-size: 0.9rem;
            box-shadow: 0 0 10px #00ffea;
            padding: 1rem;
            margin-top: auto;
        }

        .social-icons a {
            color: #00ffea;
            font-size: 2rem;
            margin: 0 1rem;
            transition: transform 0.3s ease, color 0.3s ease, text-shadow 0.3s ease;
        }

        .social-icons a:hover {
            color: #00cfc3;
            transform: scale(1.2);
            text-shadow: 0 0 10px #00ffea, 0 0 20px #00ffea;
        }
    </style>
</head>
<body>

    <!-- Barra de Navegación -->
    <nav class="navbar">
        <div class="navbar-links">
            <a href="{{ url('/dashboard') }}">Inicio</a>
            <a href="{{ route('quienes-somos') }}">Quiénes somos</a>
            <a href="{{ route('menu') }}">Menú</a>
            <a href="{{ route('reservar') }}">Reservar</a>
            <a href="{{ route('gestionar-consolas') }}">Gestionar</a>
        </div>
    </nav>

    <!-- Contenido -->
    <div class="content-wrapper">
        <section class="section-container">
            <h2>Agenda de Reservas</h2>
            <p>A continuación se muestra la agenda con todas las reservas de consolas:</p>

            <table class="reservation-table">
                <thead>
                    <tr>
                        <th>Consola</th>
                        <th>Hora de Inicio</th>
                        <th>Hora de Fin</th>
                        <th>Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->console->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($reservation->start_time)->format('H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($reservation->end_time)->format('H:i') }}</td>
                        <td>{{ $reservation->user->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2025 Tecnojuegos. Todos los derechos reservados.
    </footer>

</body>
</html>
