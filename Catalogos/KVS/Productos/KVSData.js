$(document).ready(function() {
    // Cargar productos
    function loadProducts(search = '', material = '', category = '', size = '') {
        $.ajax({
            url: 'KVS/Productos/productos.php',
            type: 'GET',
            data: { 
                action: 'getProducts', 
                search: search,
                material: material,
                category: category,
                size: size
            },
            dataType: 'json',
            success: function(response) {
                let productsHtml = '';
                response.forEach(function(product) {
                    productsHtml += `
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm" style="background-color:rgba(255, 255, 255, 0.34); border-radius:15px">
                                <img src="../${product.Galeria}" class="card-img-top" style="max-height: 400px;    border-top-left-radius: 15px;
                                border-top-right-radius: 15px;" alt="${product.nombreSub}">
                                <div class="card-body text-center">
                                    <h5 class="card-title">${product.nombreSub}</h5>
                                    <p class="card-text">Precio: ₡${product.precioSub}</p>
                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#productModal${product.id}">Ver más</button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="productModal${product.id}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel${product.id}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 80%; height: 50%;">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="productModalLabel${product.id}">${product.nombreSub}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img src="../${product.Galeria}" class="img-fluid" style="max-height: 100%; width: 100%;border-radius:15px" alt="${product.nombreSub}">
                                            </div>
                                            <div class="col-md-6">
                                                <p>Descripción:${product.descripcionSub}</p>
                                                <p>Precio: ₡${product.precioSub}</p>
                                                <p>Tamaño: ${product.tamaño}</p>
                                                <p>Categoría: ${product.categoriaSub}</p>
                                                <p>Materiales: ${product.materialesSub}</p>
                                                <button class="btn btn-success" onclick="openWhatsApp('${product.nombreSub}', '${product.precioSub}', '${product.tamaño}', '${product.categoriaSub}', '${product.materialesSub}')">Contactar en WhatsApp</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                });
                $('#products').html(productsHtml);
            }
        });
    }

    // Cargar filtros
    function loadFilters() {
        $.ajax({
            url: 'KVS/productos/productos.php',
            type: 'GET',
            data: { action: 'getFilters' },
            dataType: 'json',
            success: function(response) {
                let filtersHtml = `
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <select class="form-control" id="materialFilter">
                                <option value="">Todos los materiales</option>`;
                response.materials.forEach(function(material) {
                    filtersHtml += `<option value="${material}">${material}</option>`;
                });
                filtersHtml += `
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" id="categoryFilter">
                                <option value="">Todas las categorías</option>`;
                response.categories.forEach(function(category) {
                    filtersHtml += `<option value="${category}">${category}</option>`;
                });
                filtersHtml += `
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" id="sizeFilter">
                                <option value="">Todos los tamaños</option>`;
                response.sizes.forEach(function(size) {
                    filtersHtml += `<option value="${size}">${size}</option>`;
                });
                filtersHtml += `
                            </select>
                        </div>
                    </div>`;
                $('#filters').html(filtersHtml);

                // Eventos para los filtros
                $('#materialFilter, #categoryFilter, #sizeFilter').on('change', function() {
                    let searchValue = $('#searchInput').val();
                    let material = $('#materialFilter').val();
                    let category = $('#categoryFilter').val();
                    let size = $('#sizeFilter').val();
                    loadProducts(searchValue, material, category, size);
                });
            }
        });
    }

    // Cargar redes sociales
    function loadSocialMedia() {
        $.ajax({
            url: 'KVS/productos/productos.php',
            type: 'GET',
            data: { action: 'getSocialMedia' },
            dataType: 'json',
            success: function(response) {
                let socialMediaHtml = '';
                response.forEach(function(social) {
                    socialMediaHtml += `
                        <a href="${social.enlace}" target="_blank" class="social-media-link">
                            <img src="../admin/recursos/redes/${social.logoRS}" alt="${social.nombreRS}" class="social-media-icon" style="width: 50px; height: 50px;">
                            <h1 style="font-size:1rem">${social.nombreRS}</h1>
                        </a>`;
                });
                $('#social-buttons').html(socialMediaHtml);
            }
        });
    }

    // Inicializar
    loadProducts();
    loadFilters();
    loadSocialMedia();

    // Evento para el campo de búsqueda
    $('#searchInput').on('input', function() {
        let searchValue = $(this).val();
        let material = $('#materialFilter').val();
        let category = $('#categoryFilter').val();
        let size = $('#sizeFilter').val();
        loadProducts(searchValue, material, category, size);
    });
    
    // Eventos para los filtros
    $('#materialFilter, #categoryFilter, #sizeFilter').on('change', function() {
        let searchValue = $('#searchInput').val();
        let material = $('#materialFilter').val();
        let category = $('#categoryFilter').val();
        let size = $('#sizeFilter').val();
        loadProducts(searchValue, material, category, size);
    });
    


});

// Ocultar y mostrar el campo de búsqueda
$(document).ready(function(){
    var scrollDistanceThreshold = 500; // Umbral de distancia de desplazamiento para ocultar el campo de búsqueda
    
    // Mostrar imagen de lupa al cargar la página
    $('#searchInput').hide(); // Ocultar campo de búsqueda al cargar la página

    // Función para mostrar el campo de búsqueda al hacer clic en la imagen de lupa
    $('#searchIcon').on('click', function() {
        $('#searchInput').fadeIn(); // Mostrar suavemente el campo de búsqueda al hacer clic en la imagen
        $('#searchInput').focus(); // Enfocar el campo de búsqueda al hacer clic en la imagen
    });

    // Función para ocultar el campo de búsqueda al cambiar el tamaño de la pantalla
    $(window).on('resize', function() {
        if ($(window).width() >= 768) { // Bootstrap MD breakpoint
            $('#searchInput').fadeOut().val(''); // Ocultar suavemente y limpiar el campo de búsqueda
        }
    }).trigger('resize'); // Disparar el evento resize al cargar la página

    // Función para ocultar suavemente el campo de búsqueda al desplazarse a una cierta distancia desde la parte superior de la página
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > scrollDistanceThreshold) {
            $('#searchInput').fadeOut().val(''); // Ocultar suavemente y limpiar el campo de búsqueda al desplazarse más allá del umbral
        }
    });
});