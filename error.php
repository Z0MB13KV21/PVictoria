<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Portal Victoria - Redireccionar</title>
    <!-- Favicon para la pestaña del navegador -->
    <link rel="shortcut icon" href="admin/recursos/img/admin-icon.webp" />
    <!-- Enlaces a las fuentes de Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Just+Another+Hand&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kalam&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Neucha&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Sue+Ellen+Francisco&display=swap">
    <!-- Incluir CSS para el estilo -->
    <link rel="stylesheet" type="text/css" href="Admin/css/fonts.css">
    <script src="admin/js/nc.js"></script>
    <style>
        :root {
    font-size: 16px; /* Tamaño de letra base */
}

body {
    font-size: 1.125rem; /* Tamaño de letra para el cuerpo del documento (18px) */
}

header h1, header p {
    font-size: 2rem; /* Tamaño de letra para el encabezado (32px) */
}

.category h2, .category p {
    font-size: 1.5rem; /* Tamaño de letra para categorías y descripciones (24px) */
}

.btn {
    font-size: 1.25rem; /* Tamaño de letra para botones (20px) */
}

footer p {
    font-size: 1.4rem; /* Tamaño de letra para el pie de página (16px) */
}
img{filter:drop-shadow(0px 0px 15px grey)}
        .tab-content .tab-pane {
            padding: 20px;
            border: 1px solid #ccc;
            border-top: none;
        }
        .tab-content .informacion {
            background-color: rgba(255, 192, 203, 0.050); /* Crema rosa con 30% de opacidad */
        }
        .tab-content .registro {
            background-color: rgba(0, 255, 255, 0.038); /* Naranja claro con 30% de opacidad */
        }
        .tab-content .inicio {
            background-color: rgba(255, 107, 107, 0.038); /* Blanco con 30% de opacidad */
        }
        .card-button {
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .card-button:hover {
            transform: scale(1.1);
        }
        .card-img-overlay {
            transition: background-color 0.3s ease;
        }
        .card-img-overlay:hover {
            background-color: rgba(0, 0, 0, 0.3);
        }
        ::-webkit-scrollbar {
    display: none;
}


        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Ajuste el alto mínimo para ocupar toda la pantalla */
            background-image: url('admin/recursos/img/default-back.webp'); /* Ruta de la imagen de fondo */
        }

        .message {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .countdown-container {
            position: relative;
            margin-bottom: 5px; /* Añadido espacio inferior */
        }

        #countdown {
            font-size: 36px;
            line-height: 100px;
            position: relative;
            z-index: 2;
        }

        #inner-circle {
            position: absolute;
            width: 150px;
            height: 75px;
            background-color: pink;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.5;
            z-index: 1;
        }

        #kero-container {
            margin-top: 5px;
            max-width: 100%; /* Ajusta el ancho máximo al tamaño del contenedor */
        }

        #kero {
            width: 200px;
            height: auto;
            animation: float 2s ease-in-out infinite alternate;
        }

        @keyframes float {
            0% {
                transform: translateY(-5px);
            }
            100% {
                transform: translateY(5px);
            }
        }

        .loader {
            position: absolute;
            left: 50%; /* Centra horizontalmente */
            top: 50%; /* Centra verticalmente */
            transform: translate(-50%, -50%);
            z-index: 9999;
            background: url('admin/recursos/img/error.webp') 50% 50% no-repeat rgb(249,249,249);
            opacity: 0.8;
        }

        @media (max-width: 768px) {
            .message {
                font-size: 18px;
            }
            .countdown-container {
                margin-bottom: 10px; /* Reducido en dispositivos pequeños */
            }
            #kero-container {
                margin-top: 10px;
            }
        }

        footer {
            background-color: rgba(255, 255, 255, 0.1); 
    color: #fff;
    text-align: center;
    padding: 1em 0;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    z-index: -1;
}
    </style>
</head>
<body>

    <div class="centered-image">
        <img src="Admin/recursos/img/default-icon.webp" alt="KV Sublimaciones" class="kv-image" style="width:200px">
    </div>
    <header>
        <h1>Vaya, Creo Que Nos Hemos Perdido...</h1>
    </header>
    <!-- Fondo animado -->
    <div class="background-container"></div>
        <!-- Encabezado del catálogo -->

    
    <div class="message">¡Enseguida Volvemos!</div>
    <div class="countdown-container">
        <div id="countdown">5</div>
        <div id="inner-circle"></div>
    </div>
    <div class="loader"></div>
    <div id="kero-container">
        <img id="kero" src="admin/recursos/img/error.webp" alt="Kero">
    </div>
    <script>
        var seconds = 6;
        var countdownElement = document.getElementById('countdown');

        function countdown() {
            seconds--;
            countdownElement.textContent = seconds;

            if (seconds <= 0) {
                window.location.href = "index.php";
            } else {
                setTimeout(countdown, 1000);
            }
        }

        countdown();
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        });
    </script>
    <!-- Imagen centrada sobre el texto -->
    <footer>
    <div class="container" >
        <p> &copy; 2025 Portal Victoria 404. Todos los derechos reservados.</p>
    </div>
</footer>   
</body>
</html>
