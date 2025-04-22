<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Gamer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Orbitron', sans-serif;
            margin: 0;
            padding: 0;
            background: #0f0f0f;
            color: #00ffea;
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
            max-width: 1200px;
            margin: 4rem auto;
            padding: 0 2rem;
        }

        .section-title {
            font-size: 2rem;
            margin-bottom: 2rem;
            text-align: center;
            color: #00ffea;
            text-shadow: 0 0 10px #00ffea;
        }

        .consoles, .games {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .console-card, .game-card {
            background: #1a1a1a;
            border: 2px solid #00ffea;
            border-radius: 15px;
            box-shadow: 0 0 15px #00ffea;
            overflow: hidden;
            text-align: center;
            padding: 1rem;
        }

        .console-card img, .game-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .console-card p {
            margin-top: 1rem;
            font-size: 1.1rem;
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

<!-- Contenido -->
<div class="container">
    <h2 class="section-title">Consolas Disponibles</h2>
    <div class="consoles">
        <div class="console-card">
            <img src="https://i.pinimg.com/736x/27/fe/1d/27fe1d495437789f7115e4a35972460d.jpg" alt="PlayStation 4">
            <p>Precio por hora: $3000</p>
        </div>
        <div class="console-card">
            <img src="https://i.pinimg.com/736x/c1/75/ca/c175ca7fe7834248973f025a00945606.jpg" alt="Xbox Series">
            <p>Precio por hora: $3000</p>
        </div>
        <div class="console-card">
            <img src="https://i.pinimg.com/736x/65/68/d4/6568d4f940af208209ecdd0419d2ed0a.jpg" alt="Nintendo Switch">
            <p>Precio por hora: $3000</p>
        </div>
    </div>

    <h2 class="section-title">Juegos Populares</h2>
    <div class="games">
        <div class="game-card">
            <img src="https://i.pinimg.com/736x/03/12/a8/0312a82b5a31474dab63f2a99e40eff6.jpg" alt="Juego 1">
        </div>
        <div class="game-card">
            <img src="https://i.pinimg.com/736x/98/37/79/9837796df7a4bfa4d0071f177d18d3c9.jpg" alt="Juego 2">
        </div>
        <div class="game-card">
            <img src="https://i.pinimg.com/736x/18/3a/c7/183ac7308d6e598dbe63eefb87262c46.jpg" alt="Juego 3">
        </div>
        <div class="game-card">
            <img src="https://i.pinimg.com/736x/38/0b/c1/380bc13256421fa795a3da19c044dfb3.jpg" alt="Juego 4">
        </div>
        
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

