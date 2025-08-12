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
    <link rel="shortcut icon" href="recursos/img/admin-icon.webp" />
    <title>Administración KV Sublimación</title>
    <script src="js/nc.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
<div class="container">
    <h1 class="mt-4">Administración de Productos</h1>
    
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addProductModal">Agregar Producto</button>
    <a href="index.php" class="btn btn-primary mb-3">Regresar a Inicio</a>
    <div id="product-list" class="row">
        <!-- Aquí se mostrarán las tarjetas de productos -->
    </div>
</div>

    <!-- Modal para agregar producto -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Agregar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm">
                        <div class="form-group">
                            <label for="productName">Nombre del Producto</label>
                            <input type="text" class="form-control" id="productName" name="productName" required>
                        </div>
                        <div class="form-group">
                            <label for="productCategory">Categoría</label>
                            <select class="form-control" id="productCategory" name="productCategory" required>
                                <!-- Opciones de categoría se llenarán dinámicamente -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="productMaterial">Material</label>
                            <select class="form-control" id="productMaterial" name="productMaterial" required>
                                <!-- Opciones de material se llenarán dinámicamente -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="productSize">Tamaño</label>
                            <select class="form-control" id="productSize" name="productSize" required>
                                <!-- Opciones de tamaño se llenarán dinámicamente -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="productDescription">Descripción</label>
                            <textarea class="form-control" id="productDescription" name="productDescription" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="productPrice">Precio</label>
                            <input type="number" class="form-control" id="productPrice" name="productPrice" required>
                        </div>
                        <div class="form-group">
                            <label for="productSpecifications">Especificaciones</label>
                            <textarea class="form-control" id="productSpecifications" name="productSpecifications" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="productImage">Imagen</label>
                            <input type="file" class="form-control" id="productImage" name="productImage" required>
                            <img id="imagePreview" src="#" alt="Vista Previa" style="display: none; max-width: 100%; height: auto;" />
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="productActive" name="productActive">
                            <label class="form-check-label" for="productActive">Activo</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Modal para editar producto -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Editar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editProductForm">
                    <div class="form-group">
                        <label for="editProductName">Nombre del Producto</label>
                        <input type="text" class="form-control" id="editProductName" name="editProductName" required>
                    </div>
                    <div class="form-group">
                        <label for="editProductCategory">Categoría</label>
                        <select class="form-control" id="editProductCategory" name="editProductCategory" required>
                            <!-- Opciones de categoría se llenarán dinámicamente -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editProductMaterial">Material</label>
                        <select class="form-control" id="editProductMaterial" name="editProductMaterial" required>
                            <!-- Opciones de material se llenarán dinámicamente -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editProductSize">Tamaño</label>
                        <select class="form-control" id="editProductSize" name="editProductSize" required>
                            <!-- Opciones de tamaño se llenarán dinámicamente -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editProductDescription">Descripción</label>
                        <textarea class="form-control" id="editProductDescription" name="editProductDescription" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editProductPrice">Precio</label>
                        <input type="number" class="form-control" id="editProductPrice" name="editProductPrice" required>
                    </div>
                    <div class="form-group">
                        <label for="editProductSpecifications">Especificaciones</label>
                        <textarea class="form-control" id="editProductSpecifications" name="editProductSpecifications" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editProductImage">Imagen</label>
                        <input type="file" class="form-control" id="editProductImage" name="editProductImage">
                        <img id="editImagePreview" src="#" alt="Vista Previa" style="display: none; max-width: 100%; height: auto;" />
                    </div>
                    <div class="form-check">
    <input type="checkbox" class="form-check-input" id="editProductActive" name="editProductActive">
    <label class="form-check-label" for="editProductActive">Activo</label>
</div>

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.change-product-status').forEach(button => {
        button.addEventListener('click', () => {
            const productId = button.getAttribute('data-id');
            const currentStatus = button.getAttribute('data-status');
            const newStatus = currentStatus === 'activo' ? 'inactivo' : 'activo';
            button.textContent = newStatus === 'activo' ? 'Mostrar' : 'Ocultar';
            button.setAttribute('data-status', newStatus);
            // Aquí puedes agregar lógica adicional para cambiar el estado del producto
            // Por ejemplo, enviar una solicitud al servidor para actualizar el estado del producto
        });
    });
</script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="phpKVS/KVS.js"></script>
</body>
</html>