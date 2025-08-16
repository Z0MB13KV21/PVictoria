📘 Manual de Usuario del Portal Centro Cultural Victoria
Tabla de Contenido

Introducción

Guía para Visitantes
2.1 Navegación en el portal público
2.2 Catálogo KV Sublimación
2.3 Catálogo KV Tejido
2.4 Uso de WhatsApp y redes sociales

Guía para Estudiantes
3.1 Registro y acceso
3.2 Área personal y navegación por rol
3.3 Descarga de productos/cursos (con PDFs protegidos)
3.4 Uso de WhatsApp y cierre de sesión

Guía para Administradores
4.1 Acceso al panel de control (secretadmin.php)
4.2 Gestión de Estudiantes (CRUD, roles, contraseñas)
4.3 Gestión de Productos (sublimación y tejidos)
4.4 Subida de PDFs protegidos con contraseña
4.5 Configuración de redes sociales, logos, iconos y fondos

Preguntas Frecuentes (FAQ)

1. Introducción

El portal Centro Cultural Victoria es una plataforma digital diseñada para:

Visitantes: Explorar catálogos de productos de sublimación y tejidos.

Estudiantes: Acceder a un área privada con cursos y materiales según su especialidad.

Administradores: Gestionar estudiantes, productos y la apariencia del sitio.

Este manual tiene como objetivo ayudar a cada tipo de usuario a utilizar correctamente el sistema y resolver dudas frecuentes.

2. Guía para Visitantes
2.1 Navegación en el portal público

Accede a las secciones principales desde la página de inicio.

Los catálogos disponibles son:

KV Sublimación (KVS.php)

KV Tejido (KVC.php)

2.2 Catálogo KV Sublimación

Permite visualizar productos organizados por categoría, material y tamaño.

Cada producto incluye imagen, descripción, precio y especificaciones.

2.3 Catálogo KV Tejido

Muestra productos de tejidos (ej. amigurumis, bordados, bolsos).

Los productos incluyen un PDF protegido con contraseña para estudiantes registrados.

2.4 Uso de WhatsApp y redes sociales

En todas las secciones encontrarás íconos de WhatsApp, Instagram y otras redes sociales para contacto directo.

Haz clic en los íconos para comunicarte con el centro o seguir sus cuentas.

3. Guía para Estudiantes
3.1 Registro y Acceso

Los estudiantes deben registrarse con:

Nombre y apellido

Nombre de usuario

Contraseña (protegida con bcrypt)

Clave de acceso (proporcionada por el administrador según el rol: amigurumis, crochet, bolsos, etc.).

Acceso desde estudiante/index.php.

3.2 Área personal

El contenido cambia según el rol asignado:

Amigurumis: Materiales y cursos de amigurumis.

Bordados: Material exclusivo de bordados.

Bolsos: Productos y tutoriales relacionados.

3.3 Descarga de productos/cursos

Algunos cursos/productos se distribuyen en PDF con contraseña.

El sistema genera automáticamente una contraseña única que aparece junto al producto en el área del estudiante.

3.4 WhatsApp y cierre de sesión

Botones de contacto directo en cada página.

Para cerrar sesión, usar el botón disponible en el área privada (seguridad mediante PHP sessions).

4. Guía para Administradores
4.1 Acceso al panel de control

El acceso se hace desde secretadmin.php.

Existe un código especial oculto en config.json (tipo Konami Code) que redirige al panel secreto
.

4.2 Gestión de Estudiantes

CRUD completo desde adminEstudiante.php:

Crear: Agregar estudiante con nombre, usuario, contraseña y rol.

Editar: Cambiar nombre, usuario, rol o contraseña (encriptada automáticamente).

Eliminar: Borrar un estudiante del sistema.

Asignar roles: Determina el área de contenido que podrá ver.

4.3 Gestión de Productos

KV Sublimación (adminKVS.php):

Se asigna categoría, material y tamaño.

Se sube una imagen del producto.

KV Tejido (adminKVC.php):

Productos como amigurumis, bordados, bolsos.

Se sube imagen + PDF protegido con contraseña.

4.4 Subida de PDFs protegidos

Al agregar un producto tejido, el sistema genera automáticamente una contraseña aleatoria de 8 caracteres para proteger el PDF.

El estudiante debe usar esa clave para abrirlo.

4.5 Configuración del sitio

Desde adminRedes.php y adminExtra.php:

Redes sociales: Agregar, editar o eliminar enlaces (ej. WhatsApp, Instagram).

Fondos e iconos: Cambiar fondos (editar_fondo.php) e iconos (editar_icono.php).

Logos: Actualizar los logos visibles en la cabecera.

5. Preguntas Frecuentes (FAQ)

❓ Olvidé mi contraseña, ¿qué hago?
👉 Contacta al administrador para que la restablezca desde el panel de control.

❓ ¿Por qué necesito una clave de acceso para registrarme?
👉 Garantiza que solo estudiantes autorizados puedan acceder a su rol correspondiente.

❓ ¿Cómo se protegen mis datos?
👉 Todas las contraseñas se guardan encriptadas con bcrypt y las sesiones se gestionan de manera segura en PHP.

❓ ¿Qué pasa si un producto no aparece en el catálogo?
👉 Puede estar inactivo o oculto por decisión del administrador.

❓ ¿Cómo abrir un PDF con contraseña?
👉 Descárgalo desde tu área personal y usa la clave que aparece junto al producto.

📌 Con este manual, cada tipo de usuario (visitante, estudiante, administrador) tiene instrucciones claras y prácticas para navegar y usar el portal Centro Cultural Victoria.
