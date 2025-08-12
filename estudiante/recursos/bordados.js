$(document).ready(function () {

    // Función para cargar productos con búsqueda y paginación
    function loadProducts(search = '', page = '', container = '#all-products-container') {
        $.ajax({
            url: 'recursos/cargarBordados.php',
            method: 'GET',
            data: {
                search: search,
                page: page
            },
            dataType: 'json',
            success: function (response) {
                let productsHtml = '';
                response.forEach(function (product) {
                    productsHtml += `
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm" style="background-color:rgba(255, 255, 255, 0.34); border-radius:15px">
                                <img src="${product.GaleriaPath}" class="card-img-top" style="max-height: 400px; border-top-left-radius: 15px; border-top-right-radius: 15px;" alt="${product.NombreTej}">
                                <div class="card-body text-center">
                                    <h5 class="card-title" style="font-size:1.5rem">${product.NombreTej}</h5>

                                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#productModal${product.Id}">Ver más</button>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="productModal${product.Id}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel${product.Id}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 80%; height: 50%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="font-size:2rem" id="productModalLabel${product.Id}">${product.NombreTej}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img src="${product.GaleriaPath}" class="img-fluid" style="max-height: 100%; width: 100%; border-radius:15px" alt="${product.NombreTej}">
                                            </div>
                                            <div class="col-md-6" style="font-size:1.5rem">
                                                <p>Descripción: ${product.Descripcion}</p>
                                                <p>Tamaño: ${product.Tamaño}</p>
                                                <!-- Agregar más campos si es necesario -->
                                                <input type="password" id="pdfPassword${product.Id}" placeholder="Ingrese la contraseña para ver el PDF">
                                                <button class="btn btn-success" onclick="checkPassword('${product.Id}', '${product.ContraseñaPDF}', '${product.Pdf}')">Acceder al PDF</button>
                                                <button class="btn btn-success" onclick="openWhatsApp('${product.NombreTej}', '${product.Precio}', '${product.Tamaño}', '${product.Pagina}')">Contactar en WhatsApp</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- PDF Modal -->
                        <div class="modal fade" id="pdfModal${product.Id}" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel${product.Id}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 80%; height: 80%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="font-size:2rem" id="pdfModalLabel${product.Id}">${product.NombreTej} - PDF</h5>
                                       

                                    </div>
                                    <div class="modal-body">
                                        <iframe src="../${product.Pdf}#toolbar=0" style="width: 100%; height: 500px;frameborder="0"" ></iframe>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" onclick="openPdfFullScreen('${product.Pdf}')">Ver en pantalla completa</button>
                                    <button type="button"class="btn btn-secondary"style="text-decoration: none;color: white !important;"><a  style="text-decoration: none;color: white !important;" href="../${product.Pdf}" download="${product.NombreTej}.pdf">Descargar PDF</a></button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                });
                $(container).html(productsHtml);
            },
            error: function (xhr, status, error) {
                $(container).html(`<p>Error al cargar los productos: ${error}</p>`);
            }
        });
    }

    // Función para verificar la contraseña y mostrar el PDF
    window.checkPassword = function(productId, correctPassword, pdfUrl) {
        const inputPassword = $(`#pdfPassword${productId}`).val();
        if (inputPassword === correctPassword) {

            setTimeout(() => {
                $(`#pdfModal${productId}`).modal('show');
            }, 500);
        } else {
            alert('Contraseña incorrecta. Intente nuevamente.');
        }
    }

// Función para abrir el PDF en pantalla completa
window.openPdfFullScreen = function(pdfUrl) {
    // Abre una nueva ventana con el PDF en pantalla completa
    window.open('../'+pdfUrl + '#toolbar=0', '_blank');
}

    // Evento para el campo de búsqueda
    $('#searchInput').on('input', function () {
        let searchValue = $(this).val();
        loadProducts(searchValue); // Llamamos a loadProducts con el valor de búsqueda
    });



    // Cargar redes sociales
    function loadSocialMedia() {
        $.ajax({
            url: 'recursos/get_redes.php',
            type: 'GET',
            data: { action: 'getSocialMedia' },
            dataType: 'json',
            success: function (response) {
                let socialMediaHtml = '';
                response.forEach(function (social) {
                    socialMediaHtml += `
                        <a href="${social.enlace}" target="_blank" class="social-media-link">
                            <img src="../admin/recursos/redes/${social.logoRS}" alt="${social.nombreRS}" class="social-media-icon" style="width: 50px; height: 50px;">
                            <h1 style="font-size:1rem">${social.nombreRS}</h1>
                        </a>`;
                });
                $('#social-buttons').html(socialMediaHtml);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }
    loadSocialMedia()
    // Script para cambiar entre pestañas al hacer clic en las tarjetas o enlaces de navegación
    document.querySelectorAll('.card-button, .nav-link').forEach(function(element) {
        element.addEventListener('click', function(event) {
            event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
            var target = this.getAttribute('data-target') || this.getAttribute('href');
            if (target) { // Desactivar todas las pestañas
                document.querySelectorAll('.nav-link').forEach(function(navLink) {
                    navLink.classList.remove('active');
                });
                document.querySelectorAll('.tab-pane').forEach(function(tabPane) {
                    tabPane.classList.remove('show', 'active');
                });

                // Activar la pestaña correspondiente
                document.querySelector('[href="' + target + '"]').classList.add('active');
                document.querySelector(target).classList.add('show', 'active');

                // Cargar dinámicamente el contenido de la pestaña activa
                var container = target + '-container';
                var page = target.substring(1); // Eliminar el '#' del href
                var searchValue = $('#searchInput').val(); // Obtener el valor de búsqueda
                if (page == 'all-products') {
                    loadProducts(searchValue);
                } else {
                    loadProducts(page, container);
                }
            }
        });
    });
    // Llamar a las funciones necesarias al cargar la página

    // Cargar productos para las pestañas específicas
    loadProducts();
});
// Ocultar y mostrar el campo de búsqueda
$(document).ready(function () {
    var scrollDistanceThreshold = 500; // Umbral de distancia de desplazamiento para ocultar el campo de búsqueda

    // Mostrar imagen de lupa al cargar la página
    $('#searchInput').hide(); // Ocultar campo de búsqueda al cargar la página

    // Función para mostrar el campo de búsqueda al hacer clic en la imagen de lupa
    $('#searchIcon').on('click', function () {
        $('#searchInput').fadeIn(); // Mostrar suavemente el campo de búsqueda al hacer clic en la imagen
        $('#searchInput').focus(); // Enfocar el campo de búsqueda al hacer clic en la imagen
    });

    // Función para ocultar el campo de búsqueda al cambiar el tamaño de la pantalla
    $(window).on('resize', function () {
        if ($(window).width() >= 768) { // Bootstrap MD breakpoint
            $('#searchInput').fadeOut().val(''); // Ocultar suavemente y limpiar el campo de búsqueda
        }
    }).trigger('resize'); // Disparar el evento resize al cargar la página

    // Función para ocultar suavemente el campo de búsqueda al desplazarse a una cierta distancia desde la parte superior de la página
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > scrollDistanceThreshold) {
            $('#searchInput').fadeOut().val(''); // Ocultar suavemente y limpiar el campo de búsqueda al desplazarse más allá del umbral
        }
    });
});