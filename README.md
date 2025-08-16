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


📘 Manual de Usuario del Portal Centro Cultural Victoria
📑 Tabla de Contenido

Introducción

Acceso al portal

Guía para Visitantes

Catálogo KV Sublimación

Catálogo KV Tejido

Contacto por WhatsApp y redes sociales

Guía para Estudiantes

Registro en el sistema

Ingreso al área personal

Navegación según tu especialidad

Descarga de materiales (PDF con clave)

Contacto y cierre de sesión

Guía para Administradores

Acceso al panel de control

Gestión de estudiantes

Gestión de productos (sublimación y tejido)

Personalización del sitio (logos, fondos, redes sociales)

Preguntas Frecuentes (FAQ)

Consejos de uso y buenas prácticas

1. Introducción

El portal Centro Cultural Victoria es una plataforma en línea creada para:

Visitantes: Explorar productos y conocer el trabajo del centro.

Estudiantes: Acceder a un espacio privado con cursos, materiales y recursos exclusivos.

Administradores: Gestionar la información, productos y usuarios del portal.

Este manual tiene como objetivo ayudarte a entender cómo usar la página paso a paso, sin necesidad de conocimientos técnicos.

2. Acceso al portal

Ingresa desde la página principal:

KV Sublimación → catálogo de productos hechos en sublimación.

KV Tejido → catálogo de productos hechos en tejido (amigurumis, bordados, bolsos).

Sobre nosotros → información institucional.

Desde cualquier sección puedes contactar al centro por WhatsApp o redes sociales.

3. Guía para Visitantes
Catálogo KV Sublimación

Presenta productos elaborados con técnicas de sublimación.

Cada producto incluye: imagen, descripción, precio y características.

Algunos productos están organizados en categorías (ejemplo: camisetas, tazas, cuadros).

Catálogo KV Tejido

Muestra trabajos artesanales como amigurumis, bolsos y bordados.

Aquí encontrarás fichas de producto que incluyen imágenes y descripciones.

En algunos casos, los materiales completos (PDF) están reservados para estudiantes registrados.

Contacto

Cada catálogo incluye botones de:

WhatsApp → contacto directo con el centro.

Instagram/Facebook → enlaces a redes sociales oficiales.

4. Guía para Estudiantes
Registro en el sistema

Dirígete a la sección de Registro.

Completa tus datos: nombre, usuario, contraseña.

Introduce la clave de acceso que te haya dado tu profesor o administrador.

Una vez registrado, podrás ingresar al área privada con tu usuario y contraseña.

Ingreso al área personal

Accede desde el botón de Login/Ingresar.

Introduce tu nombre de usuario y contraseña.

Serás redirigido automáticamente a tu área de estudiante.

Navegación según tu especialidad

Dependiendo de tu rol asignado, verás un contenido diferente:

Amigurumis → cursos y patrones exclusivos de amigurumis.

Bordados → materiales de bordados.

Bolsos → diseños, tutoriales y recursos relacionados.

Descarga de materiales

Algunos recursos están en PDF protegidos con contraseña.

Al lado del archivo aparecerá la clave de acceso que deberás introducir para abrir el documento.

Esto asegura que solo los estudiantes registrados puedan usar el material.

Contacto y cierre de sesión

Dentro de tu área encontrarás un botón para escribir directamente por WhatsApp.

Para cerrar sesión, haz clic en el botón de salida; esto protege tu cuenta y evita accesos no autorizados.

5. Guía para Administradores
Acceso al panel de control

El acceso es privado y requiere una clave especial.

Una vez dentro, tendrás un menú para gestionar estudiantes, productos y apariencia del portal.

Gestión de estudiantes

Agregar estudiantes: completa un formulario con sus datos y asigna un rol (ej. Amigurumis).

Editar estudiantes: cambia sus datos, contraseñas o roles.

Eliminar estudiantes: borra un usuario del sistema cuando ya no deba tener acceso.

Gestión de productos

KV Sublimación: agrega productos con nombre, categoría, material, tamaño, precio e imagen.

KV Tejido: agrega productos como amigurumis, bolsos o bordados. Además de la imagen, puedes adjuntar un PDF protegido con contraseña.

Personalización del sitio

Desde el panel también puedes:

Subir o cambiar logos, íconos y fondos de las páginas.

Editar o eliminar redes sociales del centro.

6. Preguntas Frecuentes (FAQ)

❓ Olvidé mi contraseña, ¿qué hago?
👉 Contacta al administrador para que la restablezca.

❓ ¿Por qué necesito una clave para registrarme?
👉 Porque cada rol tiene acceso a un área diferente del portal, según la especialidad.

❓ No veo un producto en el catálogo, ¿por qué?
👉 El administrador puede haberlo ocultado o desactivado temporalmente.

❓ ¿Cómo abro un PDF protegido?
👉 Usa la clave que aparece al lado del producto en tu área personal.

7. Consejos de uso y buenas prácticas

Si eres estudiante, no compartas tu clave ni tus archivos PDF.

Mantén tu sesión cerrada cuando termines de usar el portal.

Usa los canales de contacto oficiales (WhatsApp o redes sociales).

Si eres administrador, revisa periódicamente los estudiantes activos y los productos publicados.

❓ ¿Cómo abrir un PDF con contraseña?
👉 Descárgalo desde tu área personal y usa la clave que aparece junto al producto.

📌 Con este manual, cada tipo de usuario (visitante, estudiante, administrador) tiene instrucciones claras y prácticas para navegar y usar el portal Centro Cultural Victoria.

📗 Manual Técnico del Portal Centro Cultural Victoria
📑 Tabla de Contenido

Introducción

Arquitectura General del Sistema

Base de Datos

Tablas principales

Relaciones y llaves foráneas

Seguridad en almacenamiento

Backend (PHP)

Gestión de usuarios y roles

Gestión de productos (sublimación y tejido)

Gestión de redes sociales y contenido visual

Control de sesiones y seguridad

Frontend (HTML, CSS, JS)

Estructura de catálogos

Área de estudiantes

Panel de administración

Seguridad del Sistema

Cifrado de contraseñas

Protección de PDFs

Validaciones y restricciones

Flujo de Usuario (visitante, estudiante, administrador)

Requisitos del Sistema

Procedimientos de Instalación y Configuración

Mantenimiento y buenas prácticas

1. Introducción

El portal Centro Cultural Victoria es una aplicación web desarrollada en PHP, HTML, CSS y JavaScript, con una base de datos MySQL.
El sistema se divide en tres áreas:

Público (Catálogos KV Sublimación y KV Tejido)

Estudiantes (contenido restringido según rol)

Administración (gestión completa del portal)

2. Arquitectura General del Sistema

Servidor web: Apache/Nginx (con soporte para PHP 7.4+).

Base de datos: MySQL/MariaDB.

Lenguajes:

Backend: PHP

Frontend: HTML5, CSS3, JavaScript (jQuery, AJAX)

Seguridad: manejo de sesiones, cifrado bcrypt, PDFs protegidos.

Estructura de carpetas (resumida):

/admin: Módulos de administración (estudiantes, productos, redes, apariencia).

/Catalogos: Catálogos públicos de sublimación y tejido.

/estudiante: Área privada con vistas específicas según el rol.

/includes: Conexión a base de datos y sesiones.

/secretadmin.php: acceso especial al panel oculto.

3. Base de Datos
Tablas principales:

usuarios → almacena credenciales, nombre, apellido, rol.

roles → define roles del sistema (admin, amigurumis, crochet, bolsos).

productosub → productos de sublimación.

productostej → productos de tejido, con PDF protegido.

categoriassub, materialessub, tamañomaterialsub → clasificadores para sublimación.

pagina, rutapagina, fondopagina, iconopagina, logopagina, redes → configuración del portal.

Seguridad de la BD:

Contraseñas almacenadas con bcrypt.

Validaciones de duplicados (usuarios y productos).

Restricciones en claves de acceso para roles.

4. Backend (PHP)
Gestión de usuarios:

add_student.php: alta de estudiante, valida duplicados.

edit_student.php: edición con validación de usuario único.

delete_student.php: eliminación por ID.

load_students.php: consulta y listado dinámico.

Gestión de productos:

Sublimación (productosub):

CRUD completo (crear, editar, eliminar, activar/inactivar).

Archivos de imagen en /Catalogos/KVS/Recursos/.

Tejido (productostej):

CRUD completo.

Imagen + PDF protegido con contraseña generada automáticamente.

Contraseñas generadas con función aleatoria de 8 caracteres.

Redes sociales y contenido visual:

add_social.php / edit_social.php / delete_social.php → gestión de íconos y enlaces.

editar_fondo.php / editar_icono.php → personalización de apariencia.

Sesiones:

Archivo includes/session.php → controla acceso y protege rutas.

5. Frontend (HTML, CSS, JS)
Catálogos:

KVS.php → catálogo de sublimación.

KVC.php → catálogo de tejido.

Funcionalidades con AJAX: carga de productos, filtros dinámicos.

Área de estudiantes:

Vistas personalizadas: amigurumis.php, bordados.php, bolsos.php.

Descarga de PDFs con contraseña.

Administración:

Panel en secretadmin.php.

Interfaces AJAX para CRUD en estudiantes, productos y redes.

Archivos .js (ej. adminEst.js, KVC.js, KVS.js) para manipulación de datos.

6. Seguridad del Sistema
Cifrado:

Contraseñas almacenadas con password_hash() usando bcrypt.

Protección de PDFs:

PDFs en Catalogos/KVC/{rol}/down/

Cada producto tiene un campo ContraseñaPDF.

Clave entregada al estudiante junto al producto.

Restricciones:

NC.js: bloquea clic derecho e inspección (Ctrl+Shift+I).

Validaciones en formularios (servidor y cliente).

7. Flujo de Usuario

Visitante: ingresa a catálogos → visualiza productos → contacta por WhatsApp/redes.

Estudiante: se registra → ingresa → accede a área privada → descarga materiales → cierra sesión.

Administrador: accede a secretadmin.php → gestiona estudiantes/productos → personaliza sitio.

8. Requisitos del Sistema

Servidor: Apache/Nginx con PHP 7.4+

Base de datos: MySQL 5.7+

Extensiones PHP necesarias: PDO, GD, Fileinfo

Cliente: Navegador actualizado con soporte JS y CSS3

9. Procedimientos de Instalación

Descargar el proyecto en el servidor web.

Configurar el archivo /includes/db.php con credenciales de la BD.

Importar el archivo pav.sql en MySQL.

Configurar permisos de escritura en carpetas:

/Catalogos/KVC/*/recursos/

/Catalogos/KVC/*/down/

/Catalogos/KVS/Recursos/

Verificar rutas en archivos adminExtra.php y adminRedes.php.

10. Mantenimiento y buenas prácticas

Respaldar la BD periódicamente.

Rotar las contraseñas de administración.

Revisar logs de error de PHP.

Limpiar productos inactivos y estudiantes que ya no tengan acceso.

Actualizar la versión de PHP y librerías usadas (jQuery, Bootstrap).

👉 Este manual técnico está pensado como guía de referencia para administradores del sistema y desarrolladores. Explica la estructura, seguridad, flujo y mantenimiento de la aplicación.
