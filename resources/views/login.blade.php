<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Gamer</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            background: #0f0f0f;
            color: #00ffea;
            font-family: 'Orbitron', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: #1a1a1a;
            padding: 40px;
            border: 2px solid #00ffea;
            border-radius: 20px;
            box-shadow: 0 0 30px #00ffea;
            width: 350px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #ffffff;
            text-shadow: 0 0 10px #00ffea;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            background: #0f0f0f;
            border: 1px solid #00ffea;
            border-radius: 10px;
            color: #fff;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #00ffea;
            border: none;
            border-radius: 10px;
            color: #0f0f0f;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background: #00cfc3;
        }
        a {
            color: #00ffea;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login Gamer</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required autofocus>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Ingresar</button>
            <a href="{{ route('register') }}">¿No tenés cuenta?</a>
        </form>
    </div>
</body>
</html>
