<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tecnojuegos</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            color: #fff;
            font-family: 'Orbitron', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 10px;
            color: #00ffe7;
            text-shadow: 0 0 10px #00ffe7;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .btn-container {
            display: flex;
            gap: 20px;
        }

        a {
            padding: 15px 30px;
            border: none;
            border-radius: 10px;
            background: #00ffe7;
            color: #000;
            font-weight: bold;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px #00ffe7, 0 0 20px #00ffe7;
        }

        a:hover {
            background: #0ff;
            box-shadow: 0 0 15px #0ff, 0 0 30px #0ff;
            transform: scale(1.05);
        }

        footer {
            margin-top: 40px;
            font-size: 0.8rem;
            color: #aaa;
        }
    </style>
</head>
<body>
    <h1>🎮 Tecnojuegos 🎮</h1>
    <p>¡Reserva tu consola favorita y empieza la aventura!</p>

    <div class="btn-container">
        <a href="{{ route('login') }}">Iniciar sesión</a>
        <a href="{{ route('register') }}">Registrarse</a>
    </div>

    <footer>
        © {{ date('Y') }} Tecnojuegos. Todos los derechos reservados.
    </footer>
</body>
</html>
