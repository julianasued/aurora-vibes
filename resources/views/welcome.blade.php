<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
    
    <!-- Link para o Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Link para fontes personalizadas -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
    <style>
        body {
            background: linear-gradient(to bottom, #1e3c72, #2a5298);
            font-family: 'Figtree', sans-serif;
            overflow: hidden;
            height: 100vh;
            position: relative;
            margin: 0;
        }

        /* Estrelas */
        .star {
            position: absolute;
            background-color: white;
            border-radius: 50%;
            opacity: 0.7;
            animation: twinkle 2s infinite alternate;
        }

        /* Animação das estrelas*/
        @keyframes twinkle {
            0% {
                opacity: 0.5;
                transform: scale(1);
            }
            100% {
                opacity: 1;
                transform: scale(1.5);
            }
        }

        /* Posicionando as estrelas */
        .star:nth-child(1) { top: 10%; left: 15%; width: 2px; height: 2px; animation-duration: 2s; }
        .star:nth-child(2) { top: 20%; left: 40%; width: 3px; height: 3px; animation-duration: 3s; }
        .star:nth-child(3) { top: 15%; left: 60%; width: 1.5px; height: 1.5px; animation-duration: 1.5s; }
        .star:nth-child(4) { top: 70%; left: 25%; width: 2.5px; height: 2.5px; animation-duration: 2.5s; }
        .star:nth-child(5) { top: 50%; left: 80%; width: 2px; height: 2px; animation-duration: 4s; }
        .star:nth-child(6) { top: 50%; left: 20%; width: 3px; height: 3px; animation-duration: 5s; }
        .star:nth-child(7) { top: 66%; left: 80%; width: 2px; height: 2px; animation-duration: 4s; }


        .container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            z-index: 10;
            position: relative;
        }

        /* Escudo da UESPI */
        .logo {
            width: 100px;
            height: auto;
            margin-bottom: 20px;
        }

        /* Retângulo atrás da logo e botões */
        .background-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 500px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        /* Botões */
        .btn-custom {
            padding: 12px 24px;
            font-size: 1.2rem;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: white;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        /* Posicionado botões*/
        .btn-container {
            display: flex;
            transform: translate(15.5%, -1%);
            gap: 60px;
        }

    </style>
</head>
<body>

<!-- Estrelas -->
<div class="star"></div>
<div class="star"></div>
<div class="star"></div>
<div class="star"></div>
<div class="star"></div>

<div class="container">
    <!-- Retângulo atrás da logo e botões -->
    <div class="background-box">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/70/Bras%C3%A3o_da_UESPI.svg/800px-Bras%C3%A3o_da_UESPI.svg.png" alt="Logo" class="logo">
        
        <h1 class="text-dark">Bem-vindo</h1>

        <div class="btn-container">
            <a href="{{ route('register') }}" class="btn btn-primary btn-custom">Registrar</a>
            <a href="{{ route('login') }}" class="btn btn-secondary btn-custom">Login</a>
        </div>
    </div>
</div>

<!-- Scripts do Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
