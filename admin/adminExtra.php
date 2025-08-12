<?php
include '../includes/session.php';
require_admin();
include '../includes/db.php';

// Obtener los datos de las páginas desde la base de datos
$stmt = $pdo->query("SELECT * FROM pagina");
$paginas = $stmt->fetchAll(PDO::FETCH_ASSOC);

function buscarImagen($ruta_directorio, $nombre_archivo)
{
    $extensiones = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
    foreach ($extensiones as $extension) {
        if (file_exists($ruta_directorio . '/' . $nombre_archivo . '.' . $extension)) {
            return $ruta_directorio . '/' . $nombre_archivo . '.' . $extension;
        }
    }
    return false;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="recursos/img/admin-icon.webp" />
    <title>Administración de Fondos e Iconos</title>
    <!-- Enlace a Bootstrap CSS -->
    <script src="js/nc.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            font-size: 16px;
            /* Tamaño de letra base */
        }

        body {
            font-size: 1.125rem;
            /* Tamaño de letra para el cuerpo del documento (18px) */
        }

        header h1,
        header p {
            font-size: 2rem;
            /* Tamaño de letra para el encabezado (32px) */
        }

        .category h2,
        .category p {
            font-size: 1.5rem;
            /* Tamaño de letra para categorías y descripciones (24px) */
        }

        .btn {
            font-size: 1.25rem;
            /* Tamaño de letra para botones (20px) */
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

        h1 {
            color: #FF00D4;
        }

        /* Estilos base de los botones */
        button.btn,
        a.btn {
            background-color: #FF00D4;
            border: 2px solid #FF00D4;
            /* Añadí un borde para mejorar el contraste */
            color: #FFFFFF;
            /* Color de texto blanco para mejor legibilidad */
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            transition: background-color 0.3s, border-color 0.3s, color 0.3s;
            /* Transición suave al cambiar propiedades */
        }

        /* Estilos de hover para todos los botones */
        button.btn:hover,
        a.btn:hover {
            background-color: #F39DFF;
            /* Color de fondo más claro */
            border-color: #F39DFF;
            /* Cambio de color del borde */
            color: #222222;
            /* Cambio de color del texto en hover */
        }

        img {
            filter: drop-shadow(0px 0px 15px grey)
        }

        body {
            background-image: url('../estudiante/iconback/estudiante-back.webp');

            background-size: cover;
            background-repeat: repeat;

        }

        ::-webkit-scrollbar {
            display: none;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.5);
            /* Fondo transparente */
            border: 2px solid #FBE2FF;
            color: #F39DFF;
        }

        .card:hover {
            background-color: rgba(255, 210, 255, 0.5);
            /* Fondo ligeramente azul al pasar el cursor */
            color: #FF00D4;
            /* Texto más oscuro al pasar el cursor */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Administración de Fondos e Iconos</h1>
        <a href="index.php" class="btn btn-primary">Regresar a Inicio</a>
        <!-- Mostrar las cartas -->
        <div class="row mt-4">
            <?php foreach ($paginas as $pagina) :
                $ruta_directorio = '../' . $pagina['rutaIconBack'];
                $icon_img = buscarImagen($ruta_directorio, $pagina['nombrePagina'] . '-Icon');
                $back_img = buscarImagen($ruta_directorio, $pagina['nombrePagina'] . '-Back');

                $icon_img = $icon_img ? $icon_img : 'recursos/img/default-icon.webp';
                $back_img = $back_img ? $back_img : 'recursos/img/default-back.webp';
            ?>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $pagina['nombrePagina']; ?></h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="<?php echo $icon_img; ?>" class="card-img" alt="Icono">
                                    <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#editarIcono<?php echo $pagina['id']; ?>">Editar Icono</button>
                                </div>
                                <div class="col-md-6">
                                    <img src="<?php echo $back_img; ?>" class="card-img" alt="Fondo">
                                    <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#editarFondo<?php echo $pagina['id']; ?>">Editar Fondo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal para editar el icono -->
                <div class="modal fade" id="editarIcono<?php echo $pagina['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Icono</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulario para editar el icono -->
                                <form id="formEditarIcono<?php echo $pagina['id']; ?>" enctype="multipart/form-data">
                                    <input type="file" name="nuevo_icono" class="form-control-file" accept="image/*" required>
                                    <input type="hidden" name="pagina_id" value="<?php echo $pagina['id']; ?>">
                                    <button type="button" class="btn btn-primary mt-2" onclick="editarIcono(<?php echo $pagina['id']; ?>)">Guardar Cambios</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal para editar el fondo -->
                <div class="modal fade" id="editarFondo<?php echo $pagina['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Fondo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulario para editar el fondo -->
                                <form id="formEditarFondo<?php echo $pagina['id']; ?>" enctype="multipart/form-data">
                                    <input type="file" name="nuevo_fondo" class="form-control-file" accept="image/*" required>
                                    <input type="hidden" name="pagina_id" value="<?php echo $pagina['id']; ?>">
                                    <button type="button" class="btn btn-primary mt-2" onclick="editarFondo(<?php echo $pagina['id']; ?>)">Guardar Cambios</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
    <!-- Enlace a Bootstrap JS (opcional, si lo necesitas) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function editarIcono(paginaId) {
            var formData = new FormData(document.getElementById('formEditarIcono' + paginaId));
            $.ajax({
                url: 'phpExtra/editar_icono.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Manejar la respuesta aquí
                    location.reload(); // Recargar la página para mostrar los cambios
                },
                error: function(xhr, status, error) {
                    // Manejar el error aquí
                    alert('Error al editar el icono');
                }
            });
        }
    </script>
    <script>
        function editarFondo(paginaId) {
            var formData = new FormData(document.getElementById('formEditarFondo' + paginaId));
            $.ajax({
                url: 'phpExtra/editar_fondo.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Manejar la respuesta aquí
                    location.reload(); // Recargar la página para mostrar los cambios
                },
                error: function(xhr, status, error) {
                    // Manejar el error aquí
                    alert('Error al editar el fondo');
                }
            });
        }
    </script>

</body>

</html>