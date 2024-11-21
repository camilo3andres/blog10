<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Motos - Página Bonita</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: 'FigTree', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            font-size: 2.5em;
            margin: 0;
        }

        .navbar {
            display: flex;
            justify-content: center;
            background-color: #000;
            padding: 10px 0;
        }

        .navbar a {
            color: white;
            padding: 15px;
            text-decoration: none;
            text-transform: uppercase;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .navbar a:hover {
            background-color: #FF2D20;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .moto-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
        }

        .moto-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .moto-card:hover {
            transform: translateY(-10px);
        }

        .moto-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .moto-card h3 {
            margin: 20px 0 10px;
            color: #333;
            font-size: 1.5em;
        }

        .moto-card p {
            padding: 0 20px;
            font-size: 1em;
            color: #666;
            margin-bottom: 20px;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }

        footer p {
            margin: 0;
        }

        /* Estilos para el login y registro en la esquina */
        .login-register-nav {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 20px;
        }

        .login-register-nav a {
            color: white;
            padding: 10px 20px;
            background-color: #FF2D20;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .login-register-nav a:hover {
            background-color: #ff5722;
        }

    </style>
</head>
<body>

    <header>
        <h1>Bienvenido a la Galería de Motos  ,Registrate</h1>
    </header>

    <!-- Barra de navegación de login y registro -->
    @if (Route::has('login'))
        <div class="login-register-nav">
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="container">
        <section id="motos" class="moto-gallery">
            <div class="moto-card">
                <img src="data:image/jpeg;base64,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" alt="Moto 1">
                <h3>Moto Racing</h3>
                <p>Una moto rápida y resistente, perfecta para competiciones.</p>
            </div>
            <div class="moto-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUy6DvG4ZQpv7HXhWbjkjzPAoO9JfIdNNTtg&s" alt="Moto 2">
                <h3>Moto Cruiser</h3>
                <p>Confort y estilo, ideal para largos viajes.</p>
            </div>
            <div class="moto-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShB3_YA6gG4fBAPOSOY_ZNJDV8ksO9Mv8axA&s" alt="Moto 3">
                <h3>Moto Sport</h3>
                <p>Ligera y ágil, diseñada para la velocidad.</p>
            </div>
        </section>
    </div>

    <footer>
        <p>Bloc de motos</p>
    </footer>

</body>
</html>