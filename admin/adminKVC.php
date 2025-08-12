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
    <title>Administración de Productos</title>
    <link rel="shortcut icon" href="recursos/img/admin-icon.webp" />
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
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
a#all-products-tab, a#amigurumis-tab,a#bordados-tab,a#bolsos-tab{border-top-left-radius: 15px;
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
/* Estilos específicos para botones de cambio de estado */
.btn.change-product-status {
  transition: background-color 0.3s, border-color 0.3s, color 0.3s; /* Transición suave */
}

/* Estilos para botones de cambio de estado activos */
.btn.change-product-status.active {
  background-color: #2d5658 !important;; /* Color verde para botones activos */
  color: #FFFFFF; /* Letras blancas */
}

/* Estilos para botones de cambio de estado inactivos */
.btn.change-product-status.inactive {
  background-color: #800000; /* Color rojo para botones inactivos */
  color: #FFFFFF; /* Letras blancas */
}

/* Estilos de hover para botones de cambio de estado */
.btn.change-product-status.active:hover,
.btn.change-product-status.inactive:hover {
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
        <h1 class="mb-3">Administración de Productos</h1>
        <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#addProductModal">Añadir Producto</button>
        <a href="index.php" class="btn btn-primary mb-3">Regresar a Inicio</a>
        
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="all-products-tab" data-toggle="tab" href="#all-products" role="tab" aria-controls="all-products" aria-selected="true">Todos los Productos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="amigurumis-tab" data-toggle="tab" href="#amigurumis" role="tab" aria-controls="amigurumis" aria-selected="false">Amigurumis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="bordados-tab" data-toggle="tab" href="#bordados" role="tab" aria-controls="bordados" aria-selected="false">Bordados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="bolsos-tab" data-toggle="tab" href="#bolsos" role="tab" aria-controls="bolsos" aria-selected="false">Bolsos</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content mt-0">
            <!-- Tab: Todos los Productos -->
            <div class="tab-pane fade show active" id="all-products" role="tabpanel" aria-labelledby="all-products-tab">
                <div class="row" id="all-products-container">
                    <!-- Aquí se cargarán dinámicamente los productos -->
                </div>
            </div>


            <!-- Tab: Amigurumis -->
            <div class="tab-pane fade" id="amigurumis" role="tabpanel" aria-labelledby="amigurumis-tab">
                <div class="row" id="amigurumis-container">
                    <!-- Aquí se cargarán dinámicamente los productos de amigurumis -->
                </div>
            </div>


            <!-- Tab: Bordados -->
            <div class="tab-pane fade" id="bordados" role="tabpanel" aria-labelledby="bordados-tab">
                <div class="row" id="bordados-container">
                    <!-- Aquí se cargarán dinámicamente los productos de bordados -->
                </div>
            </div>


            <!-- Tab: Bolsos -->
            <div class="tab-pane fade" id="bolsos" role="tabpanel" aria-labelledby="bolsos-tab">
                <div class="row" id="bolsos-container">
                    <!-- Aquí se cargarán dinámicamente los productos de bolsos -->
                </div>
            </div>
            <!-- Modal para Añadir Producto -->
            <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="addProductForm">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addProductModalLabel">Añadir Producto</h5>
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <h5 style="color:red; font-size:15px" class="md-5">El Nombre debe ser único</h5>
                                <div class="form-group">
                                    <label for="nombreTej">Nombre del Producto</label>
                                    
                                    <input type="text" class="form-control" id="nombreTej" name="nombreTej" required>
                                </div>
                                <div class="form-group">
                                    <label for="pagina">Página</label>
                                    <select class="form-control" id="pagina" name="pagina" required>
                                        <option value="" disabled selected>Selecciona una página</option>
                                        <option value="amigurumis">Amigurumis</option>
                                        <option value="bordados">Bordados</option>
                                        <option value="bolsos">Bolsos</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tamano">Tamaño</label>
                                    <input type="text" class="form-control" id="tamano" name="tamano" required>
                                </div>
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                                </div>
                                <div class="form-group">
                                    <label for="galeria">Galería (Imágenes)</label>
                                    <input type="file" class="form-control" id="galeria" name="galeria[]" accept="image/*" multiple>
                                </div>
                                <div class="form-group">
                                    <label for="pdf">PDF</label>
                                    <input type="file" class="form-control" id="pdf" name="pdf" accept="application/pdf">
                                </div>
                                <div class="form-group">
                                    <label for="contraseñaPDF">Contraseña PDF</label>
                                    <input type="text" class="form-control" id="contraseñaPDF" name="contraseñaPDF" readonly>
                                    <small id="contraseñaPDFHelp" class="form-text text-muted">La contraseña se generará automáticamente.</small>
                                </div>
                                <div class="form-group d-none">
                                    <label for="activo">Activo</label>
                                    <input type="text" class="form-control" id="activo" name="activo" value="activo" readonly>
                                </div>
                                <div class="form-group d-none">
                                    <label for="mostrar">Mostrar</label>
                                    <input type="text" class="form-control" id="mostrar" name="mostrar" value="mostrar" readonly>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal para Editar Producto (similar al de añadir producto) -->
            <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="editProductForm">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editProductModalLabel">Editar Producto</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <h5 style="color:red; font-size:15px" class="md-5">El Nombre debe ser único</h5>
                                <input type="hidden" id="editProductId" name="id">
                                <div class="form-group">
                                    <label for="editNombreTej">Nombre del Producto</label>
                                    <input type="text" class="form-control" id="editNombreTej" name="nombreTej" required>
                                </div>
                                <div class="form-group">
                                    <label for="editPagina">Página</label>
                                    <select class="form-control" id="editPagina" name="pagina" required>
                                        <option value="" disabled selected>Selecciona una página</option>
                                        <option value="amigurumis">Amigurumis</option>
                                        <option value="bordados">Bordados</option>
                                        <option value="bolsos">Bolsos</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="editDescripcion">Descripción</label>
                                    <textarea class="form-control" id="editDescripcion" name="descripcion" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="editTamano">Tamaño</label>
                                    <input type="text" class="form-control" id="editTamano" name="tamano" required>
                                </div>
                                <div class="form-group">
                                    <label for="editPrecio">Precio</label>
                                    <input type="number" step="0.01" class="form-control" id="editPrecio" name="precio" required>
                                </div>
                                <div class="form-group">
                                    <label for="editGaleria">Galería (Imágenes)</label>
                                    <input type="file" class="form-control" id="editGaleria" name="galeria[]" accept="image/*" multiple>
                                </div>
                                <div class="form-group">
                                    <label for="editPdf">PDF</label>
                                    <input type="file" class="form-control" id="editPdf" name="pdf" accept="application/pdf">
                                </div>
                                <div class="form-group">
                                    <label for="editContraseñaPDF">Nueva Contraseña PDF</label>
                                    <input type="text" class="form-control" id="editContraseñaPDF" name="contraseñaPDF">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script>
        document.getElementById('activo').classList.remove('d-none');
        document.getElementById('mostrar').classList.remove('d-none');

        // Generar contraseña aleatoria
        function generarContraseña() {
            const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let contraseña = '';
            for (let i = 0; i < 8; i++) {
                contraseña += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
            }
            return contraseña;
        }

        // Al cargar el modal para añadir un producto, generar una nueva contraseña y asignarla al campo de contraseña PDF
        $('#addProductModal').on('show.bs.modal', function() {
            $('#contraseñaPDF').val(generarContraseña());
        });
        
    </script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="phpKVC/KVC.js"></script>
</body>

</html>