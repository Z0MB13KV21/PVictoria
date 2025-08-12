<?php
include '../includes/session.php';
require_admin();

// Cerrar sesión al hacer clic en el botón "Cerrar Sesión"
if(isset($_POST['logout'])) {
    session_destroy();
    header('Location: ../secretadmin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="recursos/img/admin-icon.webp" />
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="js/nc.js"></script>
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
        .card-img {
            max-height: 200px;
            object-fit: contain;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
h1{color:#FF00D4;}
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
body {
    background-image: url('../estudiante/iconback/estudiante-back.webp');

    background-size: cover;
    background-repeat: repeat;

}::-webkit-scrollbar {
    display: none;
}
        .card {
            background-color: rgba(255, 255, 255, 0.5); /* Fondo transparente */
            border: 2px solid #FBE2FF; 
            color: #F39DFF; 
        }
        .card:hover {
            background-color: rgba(255, 210, 255, 0.5); /* Fondo ligeramente azul al pasar el cursor */
            color: #FF00D4; /* Texto más oscuro al pasar el cursor */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Bienvenido, Administrador</h1>
        <form method="POST" class="mb-3">
            <button type="submit" name="logout" class="btn btn-danger">Cerrar Sesión</button>
        </form>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Administrar KV Sublimación</h5>
                        <p class="card-text">Administra los recursos de sublimación.</p>
                        <a href="adminKVS.php" class="btn btn-primary">Ir al módulo</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Administrar KV Tejido</h5>
                        <p class="card-text">Administra los recursos de tejido.</p>
                        <a href="adminKVC.php" class="btn btn-primary">Ir al módulo</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Administrar Estudiantes</h5>
                        <p class="card-text">Administra los recursos de los estudiantes.</p>
                        <a href="adminEstudiante.php" class="btn btn-primary">Ir al módulo</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Administrar Redes Sociales</h5>
            <p class="card-text">Administra los enlaces y logotipos de las redes sociales.</p>
            <a href="adminRedes.php" class="btn btn-primary">Ir al módulo</a>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Administrar Fondos e Iconos</h5>
            <p class="card-text">Administra los fondos e iconos para las diferentes secciones.</p>
            <a href="AdminExtra.php" class="btn btn-primary">Ir al módulo</a>
        </div>
    </div>
</div>

        </div>
    </div>
</body>
</html>
