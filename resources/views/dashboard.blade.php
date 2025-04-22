<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Gamer</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Orbitron', sans-serif;
            margin: 0;
            padding: 0;
            background: #0f0f0f;
            color: #00ffea;
        }

        .navbar {
            position: relative;
            z-index: 10;
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

        .main-section {
            position: relative;
            overflow: hidden;
        }

        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .main-content {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 100px);
            padding: 2rem;
            z-index: 1;
        }

        .card {
            background: rgba(26, 26, 26, 0.85);
            border: 2px solid #00ffea;
            border-radius: 20px;
            box-shadow: 0 0 20px #00ffea;
            padding: 3rem;
            color: #fff;
            text-shadow: 0 0 5px #00ffea;
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        .video-background {
    position: fixed;
    top: 0;
    left: 0;
    min-width: 100%;
    min-height: 100%;
    object-fit: cover;
    z-index: -1; /* Esto evita que tape la navbar */
}

    </style>
</head>
<body>

    <!-- Navbar fija sin video detrás -->
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
            <div x-show="open" @click.away="open = false"
                x-transition
                class="dropdown-menu absolute right-0 mt-2 z-50">
                <a href="{{ route('profile.edit') }}">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Sección principal con video detrás -->
    <section class="main-section">
    <video autoplay muted loop class="video-background">
        <source src="/videos/videogamer.mp4" type="video/mp4">
    </video>
</section>



        <main class="main-content">
            <div class="card">
                <h2 class="text-3xl mb-4">¡Holaa!</h2>
                <p class="text-lg">Bienvenido a Tecnojuegos. Esperamos que te diviertas Mucho.</p>
            </div>
        </main>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
