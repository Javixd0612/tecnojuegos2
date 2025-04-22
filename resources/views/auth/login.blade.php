<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - Tecnojuegos</title>
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

        input[type="email"],
        input[type="password"] {
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

        .checkbox {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .checkbox input {
            margin-right: 10px;
        }

        .checkbox span {
            font-size: 0.9rem;
            color: #ccc;
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

        .forgot-link {
            text-align: right;
            margin-bottom: 20px;
        }

        .forgot-link a {
            color: #00ffe7;
            font-size: 0.9rem;
            text-decoration: none;
        }

        .forgot-link a:hover {
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
        <h2>Iniciar Sesión</h2>

        @if (session('status'))
            <div class="error" style="color: #00ffe7; text-align: center; margin-bottom: 20px;">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">Correo Electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="checkbox">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Recuérdame</span>
            </div>

            <div class="forgot-link">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                @endif
            </div>

            <button type="submit" class="btn-gamer">Entrar</button>
        </form>
    </div>
</body>
</html>

