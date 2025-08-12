<?php
include '../includes/session.php'; // Incluir archivo de sesión
include '../includes/db.php'; // Incluir archivo de conexión a la base de datos

require_admin(); // Asegurarse de que el usuario sea administrador

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración Estudiantes</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="recursos/img/admin-icon.webp" />
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="phpEstudiantes/adminEst.js"></script>
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

/* Estilos específicos para botones de cambio de estado con clase "btn-warning" */
button.btn.btn-warning.change-product-status.active,
button.btn.btn-warning.change-product-status.inactive {
  transition: background-color 0.3s, border-color 0.3s, color 0.3s; /* Transición suave */
}

/* Estilos específicos para botones de cambio de estado activos con clase "btn-warning" */
button.btn.btn-warning.change-product-status.active {
  background-color: #2d5658; /* Color verde para botones activos */
  color: #FFFFFF; /* Letras blancas */
}

/* Estilos específicos para botones de cambio de estado inactivos con clase "btn-warning" */
button.btn.btn-warning.change-product-status.inactive {
  background-color: #800000; /* Color rojo para botones inactivos */
  color: #FFFFFF; /* Letras blancas */
}
a.nav-link{color:#FF00D4}
a#list-tab, a#add-tab,a#edit-tab{border-top-left-radius: 15px;
    border-top-right-radius: 15px;}
.tab-content{padding:5px;border:1px solid rgba(178, 190, 181, 0.5);
   border-radius: 10px;border-top-left-radius: 0;}
li{border:1px solid rgba(178, 190, 181, 0.5); border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}
/* Estilos de hover para botones de cambio de estado activos e inactivos con clase "btn-warning" */
button.btn.btn-warning.change-product-status.active:hover,
button.btn.btn-warning.change-product-status.inactive:hover {
  background-color: #FFC8CC; /* Color de fondo más claro en hover para botones de cambio de estado */
  border-color: #FFC8CC; /* Cambio de color del borde en hover */
  color: #130e0e; /* Letras blancas */
}

img{filter:drop-shadow(0px 0px 15px grey)}
body {
    background-image: url('../estudiante/iconback/estudiante-back.webp');

    background-size: cover;
    background-repeat: repeat;

}::-webkit-scrollbar {
    display: none;
}

    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-3">Administración Estudiantes</h1>
        <a href="index.php" class="btn btn-primary mb-3">Regresar a Inicio</a>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list"
                    aria-selected="true">Listar Estudiantes</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" id="add-tab" data-toggle="tab" href="#add" role="tab" aria-controls="add"
                    aria-selected="false">Agregar Estudiante</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit"
                    aria-selected="false">Editar Estudiante</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content mt-0">
            <!-- Tab 1: Listar Estudiantes -->
            <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
                <!-- Dentro del div "student-list" en el primer tab -->
                <table class="table">

                    <tbody id="student-table-body">
                        <!-- Aquí se listarán dinámicamente los estudiantes -->
                    </tbody>
                </table>

                <div id="student-list"></div>
            </div>
            <!-- Tab 2: Agregar Estudiante -->
            <div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="add-tab">
<!-- Dentro del div "add-student-form" en el segundo tab -->
<form id="add-student-form">
    <div class="form-group">
        <label for="usuario">Usuario:</label>
        <input type="text" class="form-control" id="usuario" name="usuario" required>
    </div>
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" autocomplete="username" required>
    </div>
    <div class="form-group">
        <label for="apellido">Apellido:</label>
        <input type="text" class="form-control" id="apellido" name="apellido" autocomplete="username" required>
    </div>
    <div class="form-group">
        <label for="contraseña">Contraseña:</label>
        <input type="password" class="form-control" id="contraseña" name="contraseña" required autocomplete="current-password" required>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="verContraseña">
        <label class="form-check-label" for="verContraseña">Mostrar contraseña</label>
    </div>
    <div class="form-group">
        <label for="rol">Rol:</label>
        <select class="form-control" id="rol" name="rol" required>
            <option disabled selected value="">Seleccionar Rol</option>
            <option value="bolsos">Bolsos</option>
            <option value="amigurumis">Amigurumis</option>
            <option value="crochet">Crochet</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Agregar Estudiante</button>
</form>

<script>
    document.getElementById('verContraseña').addEventListener('change', function() {
        var contraseñaInput = document.getElementById('contraseña');
        if (this.checked) {
            contraseñaInput.type = 'text';
        } else {
            contraseñaInput.type = 'password';
        }
    });
</script>

            </div>
            <!-- Tab 3: Editar Estudiante -->
            <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                <!-- Dentro del div "edit-student-form" en el tercer tab -->
                <form id="edit-student-form">
    <div class="form-group">
        <label for="selectStudent">Seleccionar Estudiante:</label>
        <select class="form-control" id="selectStudent" name="selectStudent">
            <option value="" selected disabled>Seleccionar Estudiante</option>
            <!-- Las opciones se cargarán dinámicamente a través de AJAX -->
        </select>
    </div>
    <div class="form-group">
        <label for="editUsuario">Usuario:</label>
        <input type="text" class="form-control" id="editUsuario" name="editUsuario" autocomplete="username" required>
    </div>
    <div class="form-group">
        <label for="editNombre">Nombre:</label>
        <input type="text" class="form-control" id="editNombre" name="editNombre" autocomplete="username" required>
    </div>
    <div class="form-group">
        <label for="editApellido">Apellido:</label>
        <input type="text" class="form-control" id="editApellido" name="editApellido" autocomplete="username" required>
    </div>
    <div class="form-group">
        <label for="editContraseña">Contraseña:</label>
        <input type="password" class="form-control" id="editContraseña" name="editContraseña" required autocomplete="current-password" required>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="verEditContraseña">
        <label class="form-check-label" for="verEditContraseña">Mostrar contraseña</label>
    </div>
    <div class="form-group">
        <label for="editRol">Rol:</label>
        <select class="form-control" id="editRol" name="editRol" required>
            <option value="" disabled>Seleccionar Rol</option>
            <option value="bolsos">Bolsos</option>
            <option value="amigurumis">Amigurumis</option>
            <option value="crochet">Crochet</option>
        </select>
    </div>
    <script>
    $(document).ready(function() {
        $('#editRol').val(''); // Establecer el valor por defecto del select como ""
    });
</script>
    <button type="submit" class="btn btn-primary">Editar Estudiante</button>
</form>

</div>
        </div>
    </div>

</body>

</html>