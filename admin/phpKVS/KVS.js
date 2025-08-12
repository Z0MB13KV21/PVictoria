$(document).ready(function() {
    function loadSelectors() {
        $.ajax({
            url: 'phpKVS/getData.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#productCategory').empty();
                $('#productCategory').append('<option value="" disabled selected>Selecciona una categoría</option>');
                $.each(response.categorias, function(index, categoria) {
                    $('#productCategory').append('<option value="' + categoria.id + '">' + categoria.nombreCategoria + '</option>');
                });

                $('#productMaterial').empty();
                $('#productMaterial').append('<option value="" disabled selected>Selecciona un material</option>');
                $.each(response.materiales, function(index, material) {
                    $('#productMaterial').append('<option value="' + material.id + '">' + material.nombreMaterial + '</option>');
                });

                $('#productSize').empty();
                $('#productSize').append('<option value="" disabled selected>Selecciona un tamaño</option>');
                $.each(response.tamaños, function(index, tamaño) {
                    $('#productSize').append('<option value="' + tamaño.id + '">' + tamaño.Tamaño + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener datos: ' + error);
            }
        });
    }

    // Función para cargar la lista de productos
    function loadProducts() {
        $.ajax({
            url: 'phpKVS/get_products.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    console.error('Error al obtener productos: ' + response.error);
                    return;
                }
    
                $('#product-list').empty();
                $.each(response, function(index, product) {
                    var productCard = `
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="../${product.Galeria}" class="card-img-top" alt="${product.nombreSub}">
                                <div class="card-body">
                                    <h5 class="card-title">${product.nombreSub}</h5>
                                    <p class="card-text">${product.descripcionSub}</p>
                                    <p class="card-text">Precio: $${product.precioSub}</p>
                                    <p class="card-text">Tamaño: ${product.tamaño}</p>
                                    <p class="card-text">Especificaciones: ${product.Especificaciones}</p>
                                    <p class="card-text">Categoría: ${product.categoriaSub}</p>
                                    <p class="card-text">Materiales: ${product.materialesSub}</p>
                                    <p class="card-text">Estado: ${product.activo}</p>
                                    <button class="btn btn-primary edit-product" data-id="${product.id}" data-toggle="modal" data-target="#editProductModal">Editar</button>
                                    <button class="btn btn-danger delete-product" data-id="${product.id}">Eliminar</button>
                                    <button class="btn btn-warning change-product-status ${product.activo === 'activo' ? 'active' : 'inactive'}" data-id="${product.id}" data-status="${product.activo === 'activo' ? 'inactivo' : 'activo'}">${product.activo === 'activo' ? 'Ocultar' : 'Mostrar'}</button>


                                </div>
                            </div>
                        </div>
                    `;
                    $('#product-list').append(productCard);
                });
                
    
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar productos: ' + error);
            }
        });
    }
    


    // Cargar los selectores y la lista de productos al cargar la página
    loadSelectors();
    loadProducts();

    $('#productImage').change(function() {
        readURL(this,'#imagePreview');
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result);
                $('#imagePreview').show();
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
// Función para cargar la vista previa de la imagen al seleccionar un archivo en el campo de imagen
$('#editProductImage').change(function() {
    readURL(this, '#editImagePreview');
});

// Función para mostrar la vista previa de la imagen seleccionada
function readURL(input, previewElement) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(previewElement).attr('src', e.target.result);
            $(previewElement).show();
        }
        reader.readAsDataURL(input.files[0]);
    }
}

    // Función para enviar datos del formulario de agregar producto
    $('#addProductForm').submit(function(event) {
        event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional

        // Obtener los valores de los campos del formulario
        var productName = $('#productName').val();
        var productCategory = $('#productCategory option:selected').text(); // Obtener el texto seleccionado en lugar del valor
        var productMaterial = $('#productMaterial option:selected').text(); // Obtener el texto seleccionado en lugar del valor
        var productSize = $('#productSize option:selected').text(); // Obtener el texto seleccionado en lugar del valor
        var productDescription = $('#productDescription').val();
        var productPrice = $('#productPrice').val();
        var productSpecifications = $('#productSpecifications').val();
        var productImage = $('#productImage').prop('files')[0]; // Obtener el archivo de imagen
        var productActive = $('#productActive').is(':checked');

        // Crear un objeto FormData para enviar datos al servidor
        var formData = new FormData();
        formData.append('productName', productName);
        formData.append('productCategory', productCategory);
        formData.append('productMaterial', productMaterial);
        formData.append('productSize', productSize);
        formData.append('productDescription', productDescription);
        formData.append('productPrice', productPrice);
        formData.append('productSpecifications', productSpecifications);
        formData.append('productImage', productImage);
        formData.append('productActive', productActive);

        // Enviar los datos al servidor usando AJAX
        $.ajax({
            url: 'phpKVS/save_product.php',
            type: 'POST',
            data: formData,
            contentType: false, // No establecer tipo de contenido
            processData: false, // No procesar datos
            success: function(response) {
                // Manejar la respuesta del servidor
                console.log(response);
                loadProducts(); // Recargar la lista de productos
            },
            error: function(xhr, status, error) {
                console.error('Error al guardar el producto: ' + error);
            }
        });
    });

    // Handler para el botón de eliminar producto
    $('#product-list').on('click', '.delete-product', function() {
        var productId = $(this).data('id');
        if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
            $.ajax({
                url: 'phpKVS/delete_product.php',
                type: 'POST',
                data: { id: productId },
                success: function(response) {
                    // Manejar la respuesta del servidor
                    console.log(response);
                    loadProducts(); // Recargar la lista de productos
                },
                error: function(xhr, status, error) {
                    console.error('Error al eliminar el producto: ' + error);
                }
            });
        }
    });

// Función para cargar los selectores en el modal de edición
function loadEditSelectors(selectedCategory, selectedMaterial, selectedSize) {
    $.ajax({
        url: 'phpKVS/getData.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#editProductCategory').empty();
            $('#editProductCategory').append('<option value="" disabled>Selecciona una categoría</option>');
            $.each(response.categorias, function(index, categoria) {
                var selected = categoria.nombreCategoria === selectedCategory ? 'selected' : '';
                $('#editProductCategory').append('<option value="' + categoria.nombreCategoria + '" ' + selected + '>' + categoria.nombreCategoria + '</option>');
            });

            $('#editProductMaterial').empty();
            $('#editProductMaterial').append('<option value="" disabled>Selecciona un material</option>');
            $.each(response.materiales, function(index, material) {
                var selected = material.nombreMaterial === selectedMaterial ? 'selected' : '';
                $('#editProductMaterial').append('<option value="' + material.nombreMaterial + '" ' + selected + '>' + material.nombreMaterial + '</option>');
            });

            $('#editProductSize').empty();
            $('#editProductSize').append('<option value="" disabled>Selecciona un tamaño</option>');
            $.each(response.tamaños, function(index, tamaño) {
                var selected = tamaño.Tamaño === selectedSize ? 'selected' : '';
                $('#editProductSize').append('<option value="' + tamaño.Tamaño + '" ' + selected + '>' + tamaño.Tamaño + '</option>');
            });
                    // Establecer el estado activo/inactivo del producto
                    if (response.productActive === "activo") {
                        $('#editProductActive').prop('checked', true);
                    } else {
                        $('#editProductActive').prop('checked', false);
                    }},
                        // Marcar o desmarcar el checkbox según el estado activo/inactivo del producto

        error: function(xhr, status, error) {
            console.error('Error al obtener datos: ' + error);
        }
    });
}

// Handler para el botón de editar producto
$('#product-list').on('click', '.edit-product', function() {
    var productId = $(this).data('id');
    // Realizar una solicitud AJAX para obtener los detalles del producto para editar
    $.ajax({
        url: 'phpKVS/get_product_details.php',
        type: 'GET',
        data: { id: productId },
        dataType: 'json',
        success: function(response) {
            // Llenar el formulario de edición con los detalles del producto obtenidos
            $('#editProductName').val(response.productName);
            loadEditSelectors(response.productCategory.name, response.productMaterial.name, response.productSize.name);
            $('#editProductDescription').val(response.productDescription);
            $('#editProductPrice').val(response.productPrice);
            $('#editProductSpecifications').val(response.productSpecifications);
// Mostrar la imagen previa si existe
if (response.productImage) {
    var imagePath = '../' + response.productImage; // Agregar '../' antes de la ruta
    $('#editImagePreview').attr('src', imagePath);
    $('#editImagePreview').show();
} else {
    $('#editImagePreview').hide();
}

            // Establecer el estado activo/inactivo del producto
            if (response.productActive) {
                $('#editProductActive').prop('checked', true);
            } else {
                $('#editProductActive').prop('checked', false);
            }
            // Establecer el ID del producto en un atributo de datos del botón de guardar cambios
            $('#editProductModal').find('.btn-primary').attr('data-id', productId);
        },
        error: function(xhr, status, error) {
            console.error('Error al obtener detalles del producto: ' + error);
        }
    });
});

// Función para enviar datos del formulario de editar producto
$('#editProductForm').submit(function(event) {
    event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional

    // Obtener los valores de los campos del formulario
    var productId = $(this).find('.btn-primary').attr('data-id');
    var productName = $('#editProductName').val();
    var productCategory = $('#editProductCategory').val();
    var productMaterial = $('#editProductMaterial').val();
    var productSize = $('#editProductSize').val();
    var productDescription = $('#editProductDescription').val();
    var productPrice = $('#editProductPrice').val();
    var productSpecifications = $('#editProductSpecifications').val();
    var productImage = $('#editProductImage').prop('files')[0]; // Obtener el archivo de imagen
    var productActive = $('#editProductActive').is(':checked') ? 'activo' : 'inactivo';

    // Crear un objeto FormData para enviar datos al servidor
    var formData = new FormData();
    formData.append('productId', productId);
    formData.append('productName', productName);
    formData.append('productCategory', productCategory);
    formData.append('productMaterial', productMaterial);
    formData.append('productSize', productSize);
    formData.append('productDescription', productDescription);
    formData.append('productPrice', productPrice);
    formData.append('productSpecifications', productSpecifications);
    formData.append('productImage', productImage);
    formData.append('productActive', productActive);

    // Enviar los datos al servidor usando AJAX
    $.ajax({
        url: 'phpKVS/update_product.php',
        type: 'POST',
        data: formData,
        contentType: false, // No establecer tipo de contenido
        processData: false, // No procesar datos
        success: function(response) {
            // Manejar la respuesta del servidor
            console.log(response);
            $('#editProductModal').modal('hide'); // Ocultar el modal de edición
            loadProducts(); // Recargar la lista de productos

            // Actualizar la vista previa de la imagen si se proporciona una nueva imagen
            if (response.newImage) {
                $('#editImagePreview').attr('src', response.newImage);
                $('#editImagePreview').show();
            }
        },
        error: function(xhr, status, error) {
            console.error('Error al actualizar el producto: ' + error);
        }
    });
});
$(document).on('click', '.change-product-status', function() {
    var productId = $(this).attr('data-id');
    var newStatus = $(this).attr('data-status');

    // Enviar los datos al servidor usando AJAX
    $.ajax({
        url: 'phpKVS/estado.php',
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
            console.error('Error al cambiar el estado del producto: ' + error);
        }
    });
});});

