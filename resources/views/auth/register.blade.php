<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Tecnojuegos</title>
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
            font-family: 'Orbitron', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .form-card {
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid #00ffe7;
            border-radius: 15px;
            padding: 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 0 25px #00ffe7;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2rem;
            color: #00ffe7;
            text-shadow: 0 0 10px #00ffe7;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #00ffe7;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #00ffe7;
            border-radius: 8px;
            background-color: #1a1a2e;
            color: #fff;
            margin-bottom: 20px;
            transition: 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #0ff;
            box-shadow: 0 0 10px #0ff;
        }

        .btn-gamer {
            width: 100%;
            background: #00ffe7;
            color: #000;
            padding: 12px;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 0 15px #00ffe7, 0 0 30px #00ffe7;
        }

        .btn-gamer:hover {
            background: #0ff;
            transform: scale(1.05);
            box-shadow: 0 0 20px #0ff, 0 0 40px #0ff;
        }

        .login-link {
            margin-top: 15px;
            text-align: center;
        }

        .login-link a {
            color: #00ffe7;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .error {
            color: #ff5e5e;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="form-card">
        <h2>Crear Cuenta</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required autocomplete="new-password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">

            <button type="submit" class="btn-gamer">Registrarse</button>

            <div class="login-link">
                <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a></p>
            </div>
        </form>
    </div>
</body>
</html>
