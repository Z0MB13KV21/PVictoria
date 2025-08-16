



Manual de Usuario del Portal Centro Cultural Victoria
 
Introducción
El portal del Centro Cultural Victoria es una plataforma en línea diseñada para:
•	Visitantes: Explorar los catálogos de productos y conocer el trabajo del centro.
•	Estudiantes: Acceder a un área privada con cursos, tutoriales y recursos exclusivos según su especialidad.
•	Administradores: Gestionar la información, productos y usuarios del portal desde un panel de control.
Este manual te guiará paso a paso para que puedas usar la plataforma de manera eficiente, sin necesidad de tener conocimientos técnicos.

 
1. Guía para Visitantes
1.1 Navegación en el portal público
Desde la página principal, puedes acceder a las secciones del sitio:
•	KV Sublimación: Un catálogo de productos elaborados con esta técnica.
•	KV Tejido: Un catálogo que muestra trabajos artesanales como amigurumis, bordados y bolsos.
•	Sobre nosotros: Información institucional del centro.
1.2 Catálogos de productos
Ambos catálogos (Sublimación y Tejido) te permiten ver productos con sus respectivas imágenes, descripciones, precios y características.
En el catálogo de KV Tejido, algunos productos incluyen un PDF protegido con contraseña, que está reservado para los estudiantes registrados.
1.3 Contacto
Desde cualquier sección del portal puedes contactar al centro. Solo tienes que hacer clic en los íconos de WhatsApp, Instagram y Facebook para comunicarte directamente o seguir sus cuentas oficiales.

 
2. Guía para Estudiantes
2.1 Registro y acceso
Para registrarte, ve a la sección de Registro y completa tus datos. Necesitarás una clave de acceso que te proporcionará tu profesor o administrador. Esta clave es fundamental, ya que determina el área de contenido a la que tendrás acceso.
Una vez que tengas tus credenciales, puedes acceder a tu área personal desde el botón de Login/Ingresar.
2.2 Área personal y navegación
El contenido que verás dentro de tu área personal depende de tu rol o especialidad asignada. Por ejemplo:
•	Amigurumis: Cursos y patrones exclusivos.
•	Bordados: Materiales y tutoriales específicos.
•	Bolsos: Diseños y recursos relacionados.
2.3 Descarga de materiales
Algunos de los recursos están en PDF protegidos con contraseña. Para abrirlos, descarga el archivo y usa la clave de acceso que el sistema genera automáticamente y muestra junto al producto en tu área personal.
2.4 Cierre de sesión
Dentro de tu área privada, encontrarás un botón para cerrar sesión. Es importante que siempre lo uses para proteger tu cuenta y evitar accesos no autorizados.

3. Guía para Administradores
3.1 Acceso al panel de control
El acceso es privado y se realiza desde la URL especial secretadmin.php. Este panel te da el control total para gestionar la plataforma.
3.2 Gestión de Estudiantes
Desde el panel de control, puedes:
•	Crear: Agregar nuevos estudiantes, asignarles un rol y una contraseña.
•	Editar: Cambiar sus datos, contraseñas o roles en cualquier momento.
•	Eliminar: Borrar un usuario del sistema cuando ya no necesite acceso.
3.3 Gestión de Productos
•	KV Sublimación: Puedes agregar productos nuevos con su nombre, categoría, material, tamaño, precio e imagen.
•	KV Tejido: Para este catálogo, además de la imagen del producto, puedes adjuntar un PDF protegido con contraseña. El sistema generará una clave aleatoria de 8 caracteres que el estudiante deberá usar para abrir el archivo.
3.4 Personalización del sitio
Desde el panel de control, también puedes configurar y personalizar la apariencia del portal:
•	Subir o cambiar logos e íconos.
•	Modificar los fondos de las páginas.
•	Agregar, editar o eliminar los enlaces a las redes sociales del centro.
4. Preguntas Frecuentes (FAQ)
Olvidé mi contraseña, ¿qué hago?
Contacta al administrador para que la restablezca desde el panel de control.
¿Por qué necesito una clave de acceso para registrarme?
Esto garantiza que solo los estudiantes autorizados puedan acceder a su área de especialidad.
No veo un producto en el catálogo, ¿por qué?
Es posible que el administrador lo haya desactivado o lo haya ocultado temporalmente.
¿Cómo abro un PDF protegido?
Descarga el archivo desde tu área personal y usa la clave de acceso que aparece justo al lado del producto.
¿Cómo se protegen mis datos?
Las contraseñas de los estudiantes y administradores se guardan encriptadas con bcrypt, una de las mejores prácticas de seguridad. Las sesiones se gestionan de manera segura en PHP para proteger tu cuenta.
 


Manual Técnico del Portal Centro Cultural Victoria
 
1. Introducción
El Portal Centro Cultural Victoria es una aplicación web integral diseñada para la promoción cultural y educativa. El sistema se estructura en tres áreas principales: el portal público, el área de estudiantes y el área de administración. Está desarrollado con una arquitectura modular para una gestión eficiente y opera con una arquitectura cliente-servidor, donde el servidor web procesa las peticiones e interactúa con la base de datos.
El portal está modularizado en:
•	Público: Catálogos de productos (KV Sublimación y KV Tejido).
•	Estudiantes: Contenido restringido y específico para cada rol.
•	Administración: Panel de control para la gestión del portal.

 
2. Arquitectura General del Sistema
El portal opera con una arquitectura web estándar cliente-servidor, utilizando un stack tecnológico clásico para su funcionamiento.
Stack Tecnológico
•	Servidor Web: Apache/Nginx (con soporte para PHP 7.4+).
•	Lenguajes: PHP (backend), HTML5, CSS3, JavaScript (frontend).
•	Base de Datos: MySQL/MariaDB (5.7+).
•	Librerías/Tecnologías: jQuery y AJAX para la interactividad dinámica.
•	Seguridad: Manejo de sesiones, cifrado bcrypt y protección de PDFs.
 
Estructura de Directorios
El sistema está organizado en una estructura de carpetas lógica que separa las funcionalidades:
•	/admin: Contiene los módulos de administración, incluyendo subcarpetas para CSS, JS, recursos de imágenes (/recursos/img, /recursos/redes), y scripts PHP.
•	/Catalogos: Aloja los catálogos públicos de sublimación y tejido, con sus propios recursos de imágenes y archivos PHP (por ejemplo, /Catalogos/KVS/Recursos/ para imágenes de sublimación, /Catalogos/KVC/{rol}/down/ para PDFs protegidos).
•	/estudiante: Contiene el área privada con vistas personalizadas por rol, incluyendo sus propios recursos JavaScript y PHP.
•	/includes: Archivos de configuración y seguridad, como la conexión a la base de datos (db.php) y la gestión de sesiones (session.php).
•	/secretadmin.php: El archivo de acceso especial para el panel de administración.
•	/pav.sql: El archivo SQL para importar la base de datos.
•	/.htaccess: Archivo de reglas de redirección y reescritura de URL.

 
3. Base de Datos (MySQL)
La base de datos está diseñada para soportar la gestión de productos, usuarios y la personalización del sitio.
Estructura de Tablas
Tablas de Usuarios y Seguridad:
•	usuarios: Almacena las credenciales, nombre, apellido y rol de los usuarios.
•	roles: Define los roles del sistema (admin, amigurumis, crochet, bolsos).
Tablas de Productos:
•	productosub: Contiene los productos de sublimación.
•	productostej: Almacena los productos de tejido y el campo para el PDF protegido con contraseña.
Tablas de Clasificación:
•	categoriassub, materialessub, tamañomaterialsub: Clasificadores para los productos de sublimación.
Tablas de Configuración:
•	pagina, rutapagina, fondopagina, iconopagina, logopagina, redes: Configuración de recursos gráficos, rutas y enlaces para las distintas secciones del sitio.
 
Relaciones y Seguridad
Las relaciones entre tablas se basan principalmente en campos de texto, aunque la relación entre usuarios y roles utiliza una clave foránea. Las contraseñas de los usuarios se almacenan hasheadas con bcrypt (password_hash()). Se realizan validaciones para evitar la duplicación de usuarios y productos, garantizando que no se puedan leer en texto plano.

 
4. Backend (PHP)
El backend se encarga de la lógica del negocio, el manejo de datos y la seguridad a través de sus módulos.
Módulos Principales
•	Gestión de Estudiantes (adminEstudiante.php): Un CRUD completo para la gestión de usuarios, incluyendo funciones para agregar (add_student.php), editar (edit_student.php) y eliminar (delete_student.php).
•	Gestión de Productos: 
o	Tejido (adminKVC.php): Permite un CRUD completo para los productos de tejido. El sistema sube la imagen y el PDF asociado, y genera una contraseña aleatoria de 8 caracteres para proteger el PDF. Los PDFs se almacenan en /Catalogos/KVC/{rol}/down/.
o	Sublimación (adminKVS.php): Ofrece un CRUD completo para los productos de sublimación, con validaciones para evitar duplicados. Incluye opciones para crear, editar, eliminar y (des)activar productos. Las imágenes se guardan en /Catalogos/KVS/Recursos/.
•	Gestión de Apariencia (adminExtra.php): Módulos para editar los fondos, íconos y logos del portal (editar_fondo.php, editar_icono.php).
•	Gestión de Redes Sociales (adminRedes.php): Permite un CRUD para agregar, editar y eliminar los íconos y enlaces de las redes sociales (add_social.php, etc.).
•	Control de Sesiones: El archivo includes/session.php contiene funciones para verificar si un usuario ha iniciado sesión (is_logged_in) y si tiene permisos de administrador (is_admin) para proteger las rutas de acceso.
 
5. Frontend (HTML, CSS, JS)
El frontend está diseñado para ser interactivo y responsive, adaptándose a diferentes dispositivos.
Características Clave
•	Catálogos Públicos: Los archivos KVS.php y KVC.php utilizan AJAX para cargar productos y aplicar filtros de forma dinámica sin recargar la página.
•	Área de Estudiantes: Las vistas como amigurumis.php, bordados.php y crochet.php son personalizadas por rol y permiten la descarga de materiales protegidos con contraseña. La descarga de los PDFs se gestiona desde aquí, requiriendo la contraseña única asociada.
•	Panel de Administración: El panel en secretadmin.php usa interfaces AJAX para las operaciones de gestión, con scripts JS dedicados como adminEst.js, KVC.js y KVS.js para la manipulación de datos en el lado del cliente.
 
6. Seguridad del Sistema
El portal cuenta con varias capas de seguridad para proteger los datos y el contenido.
•	Cifrado de Contraseñas: Las contraseñas se hashean con password_hash() y bcrypt, un algoritmo robusto y moderno, garantizando que no se puedan leer en texto plano.
•	Protección de PDFs: Los archivos PDF de productos tejidos se almacenan en una carpeta protegida (/Catalogos/KVC/{rol}/down/) y se les asigna una contraseña única generada aleatoriamente de 8 caracteres. Cada PDF está asociado a una ContraseñaPDF que el estudiante debe usar para abrirlo.
•	Restricciones de Interfaz: El archivo NC.js bloquea el clic derecho y las combinaciones de teclas de inspección (Ctrl+Shift+I, C, J, K, L, S) para evitar la copia del código y contenido en el navegador, proporcionando una seguridad básica contra inspecciones no autorizadas.
•	Validaciones: El sistema realiza validaciones tanto en el cliente como en el servidor para evitar duplicados, errores en los formularios, inyecciones y otros ataques.
 
7. Requisitos y Mantenimiento
Requisitos del Sistema
Para funcionar correctamente, el portal necesita:
•	Servidor: Apache/Nginx con PHP 7.4+.
•	Base de Datos: MySQL 5.7+ o MariaDB.
•	Extensiones PHP: PDO, GD y Fileinfo (obligatorias).
•	Cliente: Un navegador actualizado con soporte para JS y CSS3.
Procedimientos de Instalación
1.	Descargar y colocar el proyecto en el servidor web.
2.	Configurar las credenciales de la base de datos en el archivo /includes/db.php.
3.	Importar el archivo pav.sql en MySQL.
4.	Configurar permisos de escritura en las carpetas de recursos (/Catalogos/KVC//recursos/, /Catalogos/KVC//down/, /Catalogos/KVS/Recursos/, y otras carpetas relevantes como /recursos/img y /recursos/redes).
5.	Verificar y ajustar las rutas en los archivos de configuración (adminExtra.php, adminRedes.php).
 
Mantenimiento
Se recomiendan las siguientes buenas prácticas:
•	Respaldar periódicamente la base de datos y los archivos.
•	Rotar las contraseñas de administración con frecuencia.
•	Revisar los logs de error de PHP para detectar fallos.
•	Actualizar la versión de PHP y las librerías utilizadas para asegurar la compatibilidad y la seguridad.

