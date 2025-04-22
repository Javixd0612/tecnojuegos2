<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Consolas</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Orbitron', sans-serif;
            background-color: #0a0a0a;
            color: #00ffff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        nav {
            background-color: #111;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #00ffff;
        }

        nav a {
            color: #00ffff;
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px;
            transition: 0.3s;
        }

        nav a:hover {
            color: #ffffff;
        }

        .nav-left, .nav-right {
            display: flex;
            align-items: center;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 30px;
            background-color: #1a1a1a;
            border: 2px solid #00ffff;
            border-radius: 10px;
            flex-grow: 1;
        }

        h1 {
            text-align: center;
            color: #00ffff;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 2px solid #00ffff;
            background-color: #0d0d0d;
            color: #00ffff;
            border-radius: 5px;
        }

        .button {
            padding: 10px 20px;
            background-color: #00ffff;
            color: #0d0d0d;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
            display: inline-block;
            width: 140px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px #00ffff;
        }

        a.button {
    text-decoration: none;
}

        .button:hover {
            background-color: #00cccc;
        }

        /* Tamaño uniforme para botones de acción */
        .button-small {
            width: 100px;
            padding: 8px 0;
            margin: 2px;
            font-size: 14px;
        }

        /* Botón editar */
        .button-editar {
            background-color: #00ff00;
            color: #000;
            box-shadow: 0 0 10px #00ff00;
            
        }

        .button-editar:hover {
            background-color: #00cc00;
        }

        /* Botón eliminar */
        .button-eliminar {
            background-color: #ff0000;
            color: #fff;
            box-shadow: 0 0 10px #ff0000;
        }

        .button-eliminar:hover {
            background-color: #cc0000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 40px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #00ffff;
            text-align: center;
        }

        th {
            background-color: #111;
        }

        .actions {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        .actions form {
            display: inline-block;
        }

        footer {
            background-color: #111;
            color: #00ffff;
            text-align: center;
            padding: 20px;
            margin-top: 60px;
            border-top: 2px solid #00ffff;
        }

    </style>
</head>
<body>

    <!-- NAVBAR GAMER -->
    <nav>
        <div class="nav-left">
            <a href="/">Inicio</a>
            <a href="/quienes-somos">Quiénes Somos</a>
            <a href="/menu">Menú</a>
            <a href="/reservar">Reservar</a>
            <a href="/gestionar-consolas">Gestionar Consolas</a>
        </div>
        <div class="nav-right">
            <a href="/dashboard">Dashboard</a>
            <form method="POST" action="/logout" style="display:inline;">
                @csrf
                <button type="submit" class="button" style="margin-left: 15px;">Cerrar sesión</button>
            </form>
        </div>
    </nav>

    <!-- CONTENEDOR PRINCIPAL -->
    <div class="container">
        <h1>{{ isset($consolaEditando) ? 'Editar Consola' : 'Agregar Nueva Consola' }}</h1>

        <!-- Formulario crear / editar -->
        @if(isset($consolaEditando))
            <form action="{{ route('consolas.update', $consolaEditando->id) }}" method="POST">
            @method('PUT')
        @else
            <form action="{{ route('consolas.store') }}" method="POST">
        @endif
            @csrf
            <div class="form-group">
                <input type="text" name="nombre" placeholder="Nombre" value="{{ $consolaEditando->nombre ?? '' }}" required>
            </div>
            <div class="form-group">
                <input type="text" name="marca" placeholder="Marca" value="{{ $consolaEditando->marca ?? '' }}" required>
            </div>
            <div class="form-group">
                <input type="text" name="version" placeholder="Versión" value="{{ $consolaEditando->version ?? '' }}" required>
            </div>
            <div class="form-group">
                <input type="number" name="precio" placeholder="Precio por hora" value="{{ $consolaEditando->precio ?? '' }}" required>
            </div>
            <button type="submit" class="button">
                {{ isset($consolaEditando) ? 'Actualizar Consola' : 'Agregar Consola' }}
            </button>
        </form>

        <!-- Tabla de consolas existentes -->
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Versión</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consolas as $consola)
                    <tr>
                        <td>{{ $consola->nombre }}</td>
                        <td>{{ $consola->marca }}</td>
                        <td>{{ $consola->version }}</td>
                        <td>${{ $consola->precio }}</td>
                        <td class="actions">
                            <!-- Botón de Editar -->
                            <a href="{{ route('consolas.edit', $consola->id) }}" class="button button-editar button-small">Editar</a>

                            <!-- Formulario para Eliminar -->
                            <form action="{{ route('consolas.destroy', $consola->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro que querés eliminar esta consola?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button button-eliminar button-small">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- FOOTER GAMER -->
    <footer>
        <p>&copy; 2025 TecnoJuegos - Todos los derechos reservados</p>
    </footer>

</body>
</html>