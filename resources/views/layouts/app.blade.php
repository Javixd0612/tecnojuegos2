<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TecnoJuegos') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Orbitron Font -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #0f0f0f;
            color: #00ffea;
            font-family: 'Orbitron', sans-serif;
        }

        .gamer-header {
            background-color: #0f0f0f;
            border-bottom: 2px solid #00ffea;
            box-shadow: 0 0 15px #00ffea;
        }

        .gamer-header .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 20px 30px;
        }

        .gamer-header h2 {
            font-size: 1.5rem;
            color: #00ffea;
            text-shadow: 0 0 6px #00ffea;
        }

        main {
            background-color: #0f0f0f;
            color: #00ffea;
            padding: 40px 20px;
        }
    </style>
</head>
