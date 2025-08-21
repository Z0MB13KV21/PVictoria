
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAVSublimacion</title>
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
    <script src="../admin/js/nc.js"></script>
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
          html, body {
      height: 100%;
    }
    body {
      display: flex;
      flex-direction: column;
    }
    .container {
      flex: 1 0 auto;

      overflow-y: auto;
    }
    footer {
      flex-shrink: 0;
      border-top: 2px solid #ddd; /* Borde superior para separación */
    }
    @media (max-width: 768px) {
      .navbar {
        transition: top 0.3s;
      }
    }
        /* Estilos CSS proporcionados */
        body {
            background-image: url('kvs/iconBack/KV Sublimación-Back.webp'); 
        }
/* Estilos base de los botones */
button.btn,
a.btn {
  background-color: #FF00D4;
  border: 2px solid #FF00D4; /* Añadí un borde para mejorar el contraste */
  color: #FFFFFF; /* Color de texto blanco para mejor legibilidad */
  padding: 10px 20px;
  text-decoration: none;
  display: inline-block;
  border-radius: 5px;
  transition: background-color 0.3s, border-color 0.3s, color 0.3s; /* Transición suave al cambiar propiedades */
}

/* Estilos de hover para todos los botones */
button.btn:hover,
a.btn:hover {
  background-color: #F39DFF; /* Color de fondo más claro */
  border-color: #F39DFF; /* Cambio de color del borde */
  color: #222222; /* Cambio de color del texto en hover */
}
img{filter:drop-shadow(0px 0px 15px grey)}
        .background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 200%; 
            height: 100%; 

            background-size: 50% 100%; 
            background-repeat: repeat-x; 
            z-index: -1; 
            animation: scroll-background 20s linear infinite; 
        }

        @keyframes scroll-background {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%); 
            }
        }

        header {
            height:max-content;
            text-align: center; 
            padding: 20px; 
            background-color: rgba(255, 255, 255, 0.34); 
            border-bottom: 2px solid #ddd; 
        }

        .centered-image {
            text-align: center; 
            padding: 20px; 
        }

        .kv-image {
            width: 100px; 
            height: 100px; 
        }

        .catalog {
            padding: 20px; 
            background-color: rgba(255, 255, 255, 0.034); 
        }

        .category {
            margin-bottom: 20px; 
            border: 1px solid #ddd; 
            padding: 10px; 
        }
        .btn-sublimaciones:hover {
            transform: scale(1.05);
}

.btn-tejidos:hover {
    transform: scale(1.05);
}

        footer { 
      flex-shrink: 0;
}
        @media screen and (max-width: 768px) {
            #social-buttons img {
                width: 100px; 
                height: auto; 
            }
            #social-buttons span {
                display: none; 
            }
        }
        img{height: fit-content;}
        ::-webkit-scrollbar {
    display: none;
} 
a.navbar-brand{
    font-family: 'Just Another Hand', cursive;
    font-size: 2rem;
}
.contenido {
      flex: 1 0 auto;
      padding-top: 60px;
      padding-bottom: 60px;
      overflow-y: auto;
    }
    /* Estilos para la barra de navegación */
.navbar-nav .nav-item.active .nav-link {
    color: #222 !important; /* Color de texto más oscuro */
    border-bottom: 0.5px solid white; /* Borde blanco en el elemento activo */
    
}


/* Estilos de hover para los enlaces de la barra de navegación */
.navbar-nav .nav-item .nav-link:hover {
    color: #222 !important; /* Texto más oscuro en hover */
    border-bottom: 0.5px solid white; /* Borde blanco en hover */
}
        /* Estilo del select con fondo rosado y bordes redondeados */
        #sizeFilter, #materialFilter, #categoryFilter {
            background-color: #ffe6f0; /* Fondo rosado claro */
            border-radius: 15px; /* Bordes redondeados */
            border: 1px solid #ff99cc; /* Borde rosado */
            padding: 0.375rem 1.75rem 0.375rem 0.75rem; /* Relleno interno */
            appearance: none; /* Eliminamos el estilo por defecto del navegador */
            -webkit-appearance: none;
            -moz-appearance: none;
            color: #ff66b2; /* Color del texto */
            width: auto; /* Ajusta el ancho al contenido */
            display: inline-block; /* Asegura que el ancho se ajuste al contenido */
        }

        /* Estilo del icono de la flecha hacia abajo */
        #sizeFilter::after, #materialFilter::after, #categoryFilter::after {
            content: '\25BC'; /* Unicode de la flecha hacia abajo */
            position: absolute;
            top: 50%;
            right: 0.75rem;
            pointer-events: none; /* Evitamos que el icono interfiera con el clic */
            transform: translateY(-50%);
            font-size: 0.8rem;
            color: #ff66b2; /* Color del icono */
        }

        /* Estilo para el icono de la flecha hacia abajo en IE */
        @supports (-ms-ime-align: auto) {
            #sizeFilter::after, #materialFilter::after, #categoryFilter::after {
                top: 1.25rem;
            }
        }

        /* Estilo al enfocar */
        #sizeFilter:hover, #materialFilter:hover, #categoryFilter:hover {
            border-color: #ff3399; /* Color del borde al enfocar */
            outline: none; /* Eliminamos el borde de enfoque predeterminado */
            box-shadow: 0 0 0 0.2rem rgba(255, 51, 153, 0.25); /* Sombra al enfocar */
        }
        #buscar:hover{            border-color: #ff3399; /* Color del borde al enfocar */
            outline: none; /* Eliminamos el borde de enfoque predeterminado */
            filter: drop-shadow(0 0 0.75rem crimson);}
            #searchInput {
    background-color: #ffe6f0; /* Fondo rosado claro */
    border-radius: 15px; /* Bordes redondeados */
    border: 1px solid #ff99cc; /* Borde rosado */
    padding: 0.375rem 1.75rem 0.375rem 0.75rem; /* Relleno interno */
    color: #ff66b2; /* Color del texto */
    width: auto; /* Ajusta el ancho al contenido */
    display: inline-block; /* Asegura que el ancho se ajuste al contenido */
}

#searchInput:hover {
    border-color: #ff3399; /* Color del borde al enfocar */
    outline: none; /* Eliminamos el borde de enfoque predeterminado */
    box-shadow: 0 0 0 0.2rem rgba(255, 51, 153, 0.25); /* Sombra al enfocar */
    filter: drop-shadow(0 0 0.75rem crimson); /* Sombra en el hover */
}

.social-media-link {
    text-decoration: none !important; /* Evitar decoración de enlace */
    color:#ff3399;
}
.social-media-link:hover {
    text-decoration: none !important; /* Evitar decoración de enlace */
    color: #ff40ff;
}
.social-media-link {
            display: block;
            text-align: center;
            margin-bottom: 20px; /* Espacio entre cada enlace */
        }

        .social-media-icon {
            width: 50px;
            height: 50px;
        }

        @media screen and (max-width: 600px) {
            .social-media-link h1 {
                display: none; /* Oculta el nombre de la red social en pantallas pequeñas */
            }
        }
    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #02b5bd;">
    <div class="container">
        <a class="navbar-brand">PAVSublimacion</a>
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
        <h1 class="mt-3" style="text-align:center">¡Bienvenid@s a PAV Sublimacion!</h1>
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
<script>
    // Script para cambiar entre pestañas al hacer clic en las tarjetas o enlaces de navegación
    document.querySelectorAll('.card-button, .nav-link').forEach(function(element) {
        element.addEventListener('click', function(event) {
            event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
            var target = this.getAttribute('data-target') || this.getAttribute('href');
            if (target) {                // Desactivar todas las pestañas
                document.querySelectorAll('.nav-link').forEach(function(navLink) {
                    navLink.classList.remove('active');
                });
                document.querySelectorAll('.tab-pane').forEach(function(tabPane) {
                    tabPane.classList.remove('show', 'active');
                });

                // Activar la pestaña correspondiente
                document.querySelector('[href="' + target + '"]').classList.add('active');
                document.querySelector(target).classList.add('show', 'active');
            }
        });
    });
     // Función para abrir WhatsApp con un mensaje personalizado
function openWhatsApp(nombreProducto, precioProducto, tamañoProducto, categoriaProducto, materialesProducto) {
    // Definir el mensaje personalizado con la información del producto
    var message = `¡Hola! Quisiera obtener más información sobre el producto ${nombreProducto}. 
                Precio: ₡${precioProducto} 
                Tamaño: ${tamañoProducto}
                Categoría: ${categoriaProducto}
                Materiales: ${materialesProducto}`;

    // Construir el enlace de WhatsApp con el mensaje personalizado
    var whatsappLink = 'https://wa.me/50671725137?text=' + encodeURIComponent(message);

    // Abrir una nueva pestaña con el enlace de WhatsApp
    window.open(whatsappLink, '_blank');
}
</script>
<script>
    $(document).ready(function() {
      let lastScrollTop = 0;
      $(window).on('scroll', function() {
        let st = $(this).scrollTop();
        if ($(window).width() < 768) {
          if (st > lastScrollTop) {
            $('.navbar').css('top', '-60px'); // Adjust height of navbar
          } else {
            $('.navbar').css('top', '0');
          }
        }
        lastScrollTop = st;
      });
    });
  </script>
</div>
<footer class=" text-center text-lg-start" style="background-color: #02b5bd;">
    <div class="container p-4">
        <p>&copy; KV Sublimaciones 2024. Todos los derechos reservados.</p>
    </div>
</footer>
</body>
</html>
