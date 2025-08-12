
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KVSublimacion</title>
    <link rel="shortcut icon" href="KVS/iconBack/KV Sublimación-Icon.webp" />
    <!-- Bootstrap CSS -->
        <!-- Enlaces a las fuentes de Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Just+Another+Hand&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kalam&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Neucha&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Sue+Ellen+Francisco&display=swap">
    <!-- Incluir CSS para el estilo -->
    <link rel="stylesheet" type="text/css" href="../Admin/css/fonts.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- no tocar estilos ni     <script src="../admin/js/nc.js"></script>-->
<style>

    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #02b5bd;">
    <div class="container">
        <a class="navbar-brand">KVSublimacion</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item">
                    <a class="nav-link" style="color:white" data-toggle="tab" href="#inicio" role="tab" aria-controls="inicio" aria-selected="true">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white" data-toggle="tab" href="#sobre-nosotros" role="tab" aria-controls="sobre-nosotros" aria-selected="false">Sobre Nosotros</a>
                </li>
            </ul>
        
        </div>
    </div>
</nav>


<div id="submenu-container"></div>

<div class="contenido">
<div class="centered-image">
        <img src="KVS/iconBack/KV Sublimación-icon.webp" alt="KV Sublimaciones" class="kv-image">
    </div>   
<header>
        <h1 class="mt-3" style="text-align:center">¡Bienvenid@s a KVSublimacion!</h1>
        </header>   
        <div id="social-buttons" class="mt-4"></div> 
<div class="container ">
    <div class="tab-content">
        <div class="tab-pane fade inicio show active" id="inicio" role="tabpanel" aria-labelledby="inicio-tab">
        <div class="container">
        <div class="row mb-4">
    <div class="col-md-12">

    <div class="input-group">

    <input type="text" class="form-control mt-4" id="searchInput" placeholder="Buscar por nombre" style="display: none;">
    <div class="input-group-append " style="display: flex; justify-content: center; align-items: center;">
        <span class="input-group-text" id="searchIcon" style="background-color: rgba(255, 120, 210, 0); border: none;">
            <img  src="../admin/recursos/img/buscar.webp" alt="Buscar" id="buscar" style="height: 40px; margin: auto;">
        </span>
        <div class="mt-4" id="filters"></div>
    </div>
</div>

</div>

</div>

                <!-- Campo de búsqueda -->
<!-- Agrega la librería de Bootstrap -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">





                <div id="products" class="row"></div>
            </div>
        </div>

     <!-- Pestaña de Sobre Nosotros -->
<div class="tab-pane fade" id="sobre-nosotros" role="tabpanel" aria-labelledby="sobre-nosotros-tab">
    <div class="container">
        <!-- Contenido de la página "Sobre Nosotros" -->
        <h2>Sobre Nosotros</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.</p>
    </div>
</div>

            </div>
        </div>
    </div>
</div>




    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="KVS/productos/kvsdata.js"></script>
    <!-- no tocar script-->
<script>

  </script>
</div>
<footer class=" text-center text-lg-start" style="background-color: #02b5bd;">
    <div class="container p-4">
        <p>&copy; KV Sublimaciones 2024. Todos los derechos reservados.</p>
    </div>
</footer>
</body>
</html>
