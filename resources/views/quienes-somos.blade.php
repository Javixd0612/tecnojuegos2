<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Quiénes Somos - Tecnojuegos</title>
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

    <div class="content-wrapper">
        <section class="section-container">
            <h2>¿Quiénes Somos?</h2>
            <p>
                Somos <strong>Tecnojuegos</strong>, un espacio creado por y para gamers. Nos dedicamos a brindar experiencias únicas con consolas, torneos, y todo el ambiente gamer que amás. ¡Viví la experiencia con nosotros!
            </p>
        </section>

        <section class="section-container">
            <h2>Contáctanos</h2>
            <div class="social-icons">
                <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>

                <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>

                <a href="https://wa.me/3022041901" target="_blank"><i class="fab fa-whatsapp"></i></a>
            </div>
        </section>
    </div>

    <footer>
        &copy; 2025 Tecnojuegos. Todos los derechos reservados.
    </footer>

</body>
</html>

