<?php
include '../includes/session.php';
require_admin();
include '../includes/db.php';


try {
    $stmt = $pdo->query("SELECT * FROM redes ORDER BY pagina, nombreRS");
    $redes_sociales = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="recursos/img/admin-icon.webp" />
    <title>Administración de Redes Sociales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        <h1 class="mb-4">Administración de Redes Sociales</h1>
        <div class="mb-3">
            <button class="btn btn-primary me-2" id="addBtn">Añadir</button>
            <button class="btn btn-warning me-2 d-none" id="editBtn">Editar</button>
            <button class="btn btn-danger me-2" id="deleteBtn">Eliminar</button>
            <a href="index.php" class="btn btn-primary">Regresar a Inicio</a>

        </div>

        <!-- Mostrar las redes sociales agrupadas por página asociada -->
        <?php
        $pagina_actual = '';
        foreach ($redes_sociales as $red) {
            if ($pagina_actual != $red['pagina']) {
                if ($pagina_actual != '') {
                    echo '</div>';
                }
                $pagina_actual = $red['pagina'];
                echo '<h2>' . htmlspecialchars($pagina_actual) . '</h2>';
                echo '<div class="row">';
            }
            echo '<div class="col-md-4 mb-3">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h1 class="card-title">' . htmlspecialchars($red['nombreRS']) . '</h1>';
            echo '<p class="card-text"><a href="' . htmlspecialchars($red['enlace']) . '" target="_blank">' . htmlspecialchars($red['enlace']) . '</a></p>';
            echo '<img src="recursos/redes/' . (empty($red['logoRS']) ? 'NoDisponible.webp' : htmlspecialchars($red['logoRS'])) . '" class="img-fluid mb-3" alt="' . htmlspecialchars($red['nombreRS']) . '">';
            echo '<button class="btn btn-sm btn-primary me-2 edit-btn" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' . $red['id'] . '" data-nombre="' . htmlspecialchars($red['nombreRS']) . '" data-pagina="' . htmlspecialchars($red['pagina']) . '" data-enlace="' . htmlspecialchars($red['enlace']) . '" data-logo="' . htmlspecialchars($red['logoRS']) . '">Editar</button>';
            echo '<input type="checkbox" class="delete-checkbox me-2" data-id="' . $red['id'] . '">';
            echo '<button class="btn btn-sm btn-danger delete-btn" data-id="' . $red['id'] . '">Eliminar</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        if ($pagina_actual != '') {
            echo '</div>';
        }
        ?>
    </div>

    <!-- Modal para añadir una nueva red social -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Añadir Red Social</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="phpRedes/add_social.php">
                        <div class="mb-3">
                            <label for="nombreRS" class="form-label">Nombre de la Red Social:</label>
                            <input type="text" id="nombreRS" name="nombreRS" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="pagina" class="form-label">Página Asociada:</label>
                            <select id="pagina" name="pagina" class="form-select" required>
                                <option value="">Seleccione una página</option>
                                <option value="Estudiante">Estudiante</option>
                                <option value="KV Sublimación">KV Sublimación</option>
                                <option value="KV Tejido">KV Tejido</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="enlace" class="form-label">Enlace:</label>
                            <input type="url" id="enlace" name="enlace" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="logoRS" class="form-label">Logo de la Red Social:</label>
                            <input type="file" id="logoRS" name="logoRS" class="form-control" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label>Vista Previa de la Imagen:</label>
                            <div id="preview-container" class="mb-3">
                                <img id="preview-logo" src="../admin/recursos/img/NoDisponible.webp" class="img-fluid" alt="Vista Previa">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_social">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Modal para editar unared social -->

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Red Social</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="phpRedes/edit_social.php">
                    <input type="hidden" id="edit-id" name="id">
                    <div class="mb-3">
                        <label for="edit-nombreRS" class="form-label">Nombre de la Red Social:</label>
                        <input type="text" id="edit-nombreRS" name="nombreRS" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-pagina" class="form-label">Página Asociada:</label>
                        <select id="edit-pagina" name="pagina" class="form-select" required>
                            <option value="">Seleccione una página</option>
                            <option value="Estudiante">Estudiante</option>
                            <option value="KV Sublimación">KV Sublimación</option>
                            <option value="KV Tejido">KV Tejido</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-enlace" class="form-label">Enlace:</label>
                        <input type="url" id="edit-enlace" name="enlace" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-logoRS" class="form-label">Logo de la Red Social:</label>
                        <input type="file" id="edit-logoRS" name="logoRS" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label>Vista Previa de la Imagen:</label>
                        <div id="edit-preview-container" class="mb-3">
                            <img id="edit-preview-logo" src="../admin/recursos/img/NoDisponible.webp" class="img-fluid" alt="Vista Previa">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="edit_social">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('addBtn').addEventListener('click', function() {
        new bootstrap.Modal(document.getElementById('addModal')).show();
    });

    document.getElementById('editBtn').addEventListener('click', function() {
        new bootstrap.Modal(document.getElementById('editModal')).show();
    });
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            if (confirm('¿Estás seguro de que deseas eliminar esta red social?')) {
                fetch('phpRedes/delete_social.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ ids: [id] })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // La red social se eliminó correctamente, puedes actualizar la página o cualquier otro comportamiento deseado
                        window.location.reload();
                    } else {
                        alert('Error al eliminar la red social.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Se produjo un error al intentar eliminar la red social.');
                });
            }
        });
    });
    document.getElementById('deleteBtn').addEventListener('click', function() {
        // Lógica para eliminar redes sociales seleccionadas
        const checkboxes = document.querySelectorAll('.delete-checkbox:checked');
        const ids = Array.from(checkboxes).map(checkbox => checkbox.getAttribute('data-id'));
        if (ids.length > 0) {
            if (confirm('¿Está seguro de que desea eliminar las redes sociales seleccionadas?')) {
                // Realizar la solicitud de eliminación
                fetch('phpRedes/delete_social.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ ids: ids })
                }).then(response => response.json())
                  .then(data => {
                      if (data.success) {
                          window.location.reload();
                      } else {
                          alert('Error al eliminar las redes sociales.');
                      }
                  });
            }
        } else {
            alert('Seleccione al menos una red social para eliminar.');
        }
    });

    // Actualizar la vista previa de la imagen al seleccionar un archivo
    document.getElementById('logoRS').addEventListener('change', function() {
        const file = this.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-logo').src = e.target.result;
        };
        reader.readAsDataURL(file);
    });

    // Actualizar la vista previa de la imagen de edición al seleccionar un archivo
    document.getElementById('edit-logoRS').addEventListener('change', function() {
        const file = this.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('edit-preview-logo').src = e.target.result;
        };
        reader.readAsDataURL(file);
    });

    // Llenar el modal de edición con los datos de la red social seleccionada
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const nombre = this.getAttribute('data-nombre');
const pagina = this.getAttribute('data-pagina');
const enlace = this.getAttribute('data-enlace');
const logo = this.getAttribute('data-logo');
document.getElementById('edit-id').value = id;
        document.getElementById('edit-nombreRS').value = nombre;
        document.getElementById('edit-pagina').value = pagina;
        document.getElementById('edit-enlace').value = enlace;

        // Mostrar la imagen actual o la imagen por defecto si no hay imagen disponible
        const currentLogoContainer = document.getElementById('edit-preview-container');
        const currentLogo = document.getElementById('edit-preview-logo');
        if (logo) {
            currentLogo.src = 'recursos/redes/' + logo;
        } else {
            currentLogo.src = '../admin/recursos/img/NoDisponible.webp';
        }

        new bootstrap.Modal(document.getElementById('editModal')).show();
    });
});</script>
</body>
</html>