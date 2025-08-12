<?php
include 'includes/db.php';
include 'includes/session.php';
// Verificar si ya hay una sesión activa
if (isset($_SESSION['usuario'])) {
    // Redireccionar a estudiante/index.php si hay una sesión activa
    header('Location: estudiante/index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        // Obtener los datos del formulario
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $contraseña = $_POST['contraseña'];
        $rol = $_POST['rol']; // Obtener el rol seleccionado
        $acceso = $_POST['acceso']; // Obtener la clave de acceso

        // Verificar si el nombre de usuario ya está en uso
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $stmt->execute([$usuario]);
        $existing_user = $stmt->fetch();

        if ($existing_user) {
            echo "El nombre de usuario ya está en uso. Por favor, elija otro.";
        } else {
            // Verificar si el valor de "acceso" coincide con el rol seleccionado
            $stmt = $pdo->prepare("SELECT * FROM roles WHERE rol = ? AND acceso = ?");
            $stmt->execute([$rol, $acceso]);
            $role = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($role) {
                // Insertar el nuevo usuario en la base de datos
                $hashed_password = password_hash($contraseña, PASSWORD_BCRYPT);
                $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, nombre, apellido, contraseña, rol) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$usuario, $nombre, $apellido, $hashed_password, $rol]);
                echo "Usuario registrado exitosamente";
            } else {
                echo "Clave de acceso no válida para el rol seleccionado";
            }
        }
    } elseif (isset($_POST['login'])) {
        // Inicio de sesión
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $stmt->execute([$usuario]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($contraseña, $user['contraseña'])) {
            $_SESSION['usuario'] = $user['usuario'];
            $_SESSION['rol'] = $user['rol'];
            // Redireccionar a estudiante/index.php después de iniciar sesión
            header('Location: estudiante/index.php');
            exit();
        } else {
            echo "Usuario o contraseña incorrectos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Estudiantes Victoria</title>
    <link rel="shortcut icon" href="estudiante/iconBack/estudiante-icon.webp" />
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    font-size: 1.6rem; /* Tamaño de letra base */
}

body {
    font-size: 1.125rem; /* Tamaño de letra para el cuerpo del documento (18px) */
}

header h1, header p {
    font-size: 1.1rem; /* Tamaño de letra para el encabezado (32px) */
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
    }
    @media (max-width: 768px) {
      .navbar {
        transition: top 0.3s;
      }
    }
        /* Estilos CSS proporcionados */
        body {
            background-image: url('estudiante/iconBack/estudiante-Back.webp'); 
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
a.navbar-brand{
    font-family: 'Just Another Hand', cursive;
    font-size: 2rem;
}
footer {
      flex-shrink: 0;
      border-top: 2px solid #ddd; /* Borde superior para separación */
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
.contenido {
      flex: 1 0 auto;

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
    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #02b5bd;">
    <div class="container" >
        <a class="navbar-brand">Estudiantes Portal Victoria</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" >
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" style="color:white" data-toggle="tab" href="#inicio" role="tab" aria-controls="inicio" aria-selected="true">Inicio Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white"data-toggle="tab" href="#registro" role="tab" aria-controls="registro" aria-selected="false">Registro de Estudiante</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:white"data-toggle="tab" href="#informacion" role="tab" aria-controls="informacion" aria-selected="false">Información</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
<br>
<div class="container mt-5"style="height: 50px;">
    <div class="row justify-content-center mb-4">
        <div class="col-md-4">
            <div class="card card-button" data-target="#inicio" role="tab">
                <img src="estudiante\iconBack\estudiante-btn.webp" class="card-img" alt="Inicio" style="height: 50px;">
                <div class="card-img-overlay d-flex align-items-center justify-content-center">
                    <h5 class="text-black">Inicio Sesión</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-button" data-target="#registro" role="tab">
                <img src="estudiante\iconBack\estudiante-btn.webp" class="card-img" alt="Registro"style="height: 50px;">
                <div class="card-img-overlay d-flex align-items-center justify-content-center">
                    <h5 class="text-black">Registro</h5>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-button" data-target="#informacion" role="tab">
                <img src="estudiante\iconBack\estudiante-btn.webp" class="card-img" alt="Info"style="height: 50px;">
                <div class="card-img-overlay d-flex align-items-center justify-content-center">
                    <h5 class="text-black">Información</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="contenido">
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade inicio show active" id="inicio" role="tabpanel" aria-labelledby="inicio-tab">
                    <h1 class="mb-1">Iniciar Sesión</h1>
                    <form method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="usuario" placeholder="Usuario" autocomplete="username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="contraseña" placeholder="Contraseña" autocomplete="current-password" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="login">Iniciar Sesión</button>
                    </form>
    </div>
</div>

    <div id="message"></div>

<div class="tab-content" id="myTabContent">
<div class="tab-pane fade" id="registro" role="tabpanel" aria-labelledby="registro-tab">
                <h1 class="mb-1">Registro de Estudiante</h1>
                <form method="POST">
                <div class="form-group">
            <input type="text" class="form-control" name="usuario" placeholder="Usuario" autocomplete="username" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" autocomplete="username" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="apellido" placeholder="Apellido" autocomplete="username" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="contraseña" placeholder="Contraseña" autocomplete="current-password" required>
        </div>
                    <div class="form-group">
                        <select class="form-control" name="rol" required>
                            <option value="">Seleccione un rol</option>
                            <option value="amigurumis">Amigurumis</option>
                            <option value="crochet">Crochet</option>
                            <option value="bolsos">Bolsos</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="acceso" placeholder="Clave de acceso" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="register">Registrar</button>
                </form>
    </div>
</div>

        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade informacion" id="informacion" role="tabpanel" aria-labelledby="informacion-tab">
            <h3 class="mt-1">Información</h3>
            <p>Contenido de información general.</p>
            <p class="mt-3">Para modificar la información mostrada en esta sección, puedes editar este contenido directamente en el archivo HTML en la sección de "Información".</p>
        </div>
    </div>
</div>
</div>


<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Script para cambiar entre pestañas al hacer clic en las tarjetas
    document.querySelectorAll('.card-button').forEach(function(card) {
        card.addEventListener('click', function() {
            var target = this.getAttribute('data-target');
            if (target) {
                // Desactivar todas las pestañas
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
</script>
<script>
    // Script para cambiar entre pestañas al hacer clic en las tarjetas o enlaces de navegación
    document.querySelectorAll('.card-button, .nav-link').forEach(function(element) {
        element.addEventListener('click', function(event) {
            event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
            var target = this.getAttribute('data-target') || this.getAttribute('href');
            if (target) {
                // Desactivar todas las pestañas
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
    // Obtener el navbar
var navbar = document.querySelector('.navbar');

// Obtener la posición inicial de la página
var scrollPos = window.pageYOffset;

// Función para verificar la dirección del scroll
function checkScrollDirection() {
    var newScrollPos = window.pageYOffset;
    if (newScrollPos > scrollPos) {
        // Scroll hacia abajo
        navbar.classList.remove('scrolled');
    } else {
        // Scroll hacia arriba
        navbar.classList.add('scrolled');
    }
    scrollPos = newScrollPos;
}

// Detectar el evento de scroll
window.addEventListener('scroll', checkScrollDirection);

</script>


</body>
<footer class=" text-center text-lg-start" style="background-color: #02b5bd;">
    <div class="container p-4">
        <p> &copy; KV Estudiantes 2025. Todos los derechos reservados.</p>
    </div>
</footer>
</html>
