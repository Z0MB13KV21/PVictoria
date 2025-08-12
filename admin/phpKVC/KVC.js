$(document).ready(function() {
    // Cargar todos los productos al inicio
    loadProducts();



    // Función para cargar productos
    function loadProducts(page = '', container = '#all-products-container') {
        $.ajax({
            url: 'phpKVC/loadProducts.php',
            method: 'GET',
            data: { page: page },
            success: function(response) {
                $(container).html(response);

            }
        });
    }

    loadProducts('amigurumis', '#amigurumis-container');
    loadProducts('bordados', '#bordados-container');
    loadProducts('bolsos', '#bolsos-container');
    // Evento para añadir producto
    $('#addProductForm').on('submit', function(event) {
        event.preventDefault();
        generarContraseña()
        $.ajax({
            url: 'phpKVC/addProduct.php',
            method: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
                $('#editProductModal').modal('hide');
                $('#addProductForm')[0].reset();
                loadProducts();
                loadProducts('amigurumis', '#amigurumis-container');
                loadProducts('bordados', '#bordados-container');
                loadProducts('bolsos', '#bolsos-container');
            }
        });
    });

    // Evento para editar producto
    $(document).on('click', '.edit-product', function() {
        var id = $(this).data('id');
        $.ajax({
            url: 'phpKVC/getProduct.php',
            method: 'GET',
            data: { id: id },
            success: function(response) {
                var product = JSON.parse(response);
                $('#editProductId').val(product.Id);
                $('#editNombreTej').val(product.NombreTej);
                $('#editPagina').val(product.Pagina);
                $('#editDescripcion').val(product.Descripcion);
                $('#editTamano').val(product.Tamaño);
                $('#editPrecio').val(product.Precio);
                $('#editProductModal').modal('show');
            }
        });
    });

    $('#editProductForm').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: 'phpKVC/editProduct.php',
            method: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
                loadProducts();
                $('#editProductModal').modal('hide');
                $('#editProductForm')[0].reset();
                loadProducts('amigurumis', '#amigurumis-container');
                loadProducts('bordados', '#bordados-container');
                loadProducts('bolsos', '#bolsos-container');
            }
        });
    });
// Handler para el botón de cambiar estado activo/inactivo
$(document).on('click', '.change-product-status-active', function() {
    var productId = $(this).attr('data-id');
    var newStatus = $(this).attr('data-status');

    // Enviar los datos al servidor usando AJAX
    $.ajax({
        url: 'phpKVC/estado.php',
        type: 'POST',
        data: {
            productId: productId,
            productActive: newStatus
        },
        success: function(response) {
            // Actualizar la vista con el nuevo estado del producto
            $('[data-id="' + productId + '"]').siblings('.card-text').filter(function() {
                return $(this).text().includes('Estado');
            }).text('Estado: ' + newStatus);
            loadProducts();

        },
        error: function(xhr, status, error) {
            console.error('Error al cambiar el estado activo/inactivo del producto: ' + error);
        }
    });
});

// Handler para el botón de cambiar estado mostrar/ocultar
$(document).on('click', '.change-product-status-show', function() {
    var productId = $(this).attr('data-id');
    var newStatus = $(this).attr('data-status');

    // Enviar los datos al servidor usando AJAX
    $.ajax({
        url: 'phpKVC/estado_mostrar.php',
        type: 'POST',
        data: {
            productId: productId,
            productShow: newStatus
        },
        success: function(response) {
            // Actualizar la vista con el nuevo estado del producto
            $('[data-id="' + productId + '"]').siblings('.card-text').filter(function() {
                return $(this).text().includes('Mostrando');
            }).text('Mostrando: ' + newStatus);
            loadProducts();

        },
        error: function(xhr, status, error) {
            console.error('Error al cambiar el estado mostrar/ocultar del producto: ' + error);
        }
    });
});

    // Evento para eliminar producto
    $(document).on('click', '.delete-product', function() {
        if (confirm("¿Estás seguro de eliminar este producto?")) {
            var id = $(this).data('id');
            $.ajax({
                url: 'phpKVC/deleteProduct.php',
                method: 'POST',
                data: { id: id },
                success: function(response) {
                    loadProducts('amigurumis', '#amigurumis-container');
                    loadProducts('bordados', '#bordados-container');
                    loadProducts('bolsos', '#bolsos-container');
                }
            });
        }
    });
});
