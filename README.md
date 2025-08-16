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
