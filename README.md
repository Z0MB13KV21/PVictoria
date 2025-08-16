
# Portal Centro Cultural Victoria

Este repositorio contiene el código fuente del Portal del Centro Cultural Victoria, una plataforma web integral diseñada para la promoción cultural y educativa. El sistema se divide en tres áreas principales: un portal público, un área privada para estudiantes y un panel de administración.

-----

## 📖 Manual de Usuario

### Introducción

El **Portal del Centro Cultural Victoria** es una plataforma en línea diseñada para:

  * **Visitantes:** Explorar catálogos de productos y conocer el trabajo del centro.
  * **Estudiantes:** Acceder a un área privada con cursos, tutoriales y recursos exclusivos.
  * **Administradores:** Gestionar toda la información, productos y usuarios del portal.

Este manual te guiará paso a paso para que puedas usar la plataforma de manera eficiente, sin necesidad de tener conocimientos técnicos.

### 1\. Guía para Visitantes

#### 1.1 Navegación en el Portal Público

Desde la página principal, puedes acceder a las siguientes secciones del sitio:

  * **KV Sublimación:** Un catálogo de productos elaborados con esta técnica.
  * **KV Tejido:** Un catálogo que muestra trabajos artesanales como amigurumis, bordados y bolsos.
  * **Sobre nosotros:** Información institucional del centro.

#### 1.2 Catálogos de Productos

Ambos catálogos (Sublimación y Tejido) te permiten ver productos con sus respectivas imágenes, descripciones, precios y características. En el catálogo de **KV Tejido**, algunos productos incluyen un PDF protegido con contraseña, reservado para los estudiantes registrados.

#### 1.3 Contacto

Desde cualquier sección del portal, puedes contactar al centro haciendo clic en los íconos de **WhatsApp**, **Instagram** y **Facebook**.

### 2\. Guía para Estudiantes

#### 2.1 Registro y Acceso

Para registrarte, ve a la sección de **Registro** y completa tus datos. Necesitarás una **clave de acceso** que te proporcionará tu profesor o administrador. Esta clave es fundamental, ya que determina el contenido al que tendrás acceso.

Una vez que tengas tus credenciales, puedes acceder a tu área personal desde el botón de **Login/Ingresar**.

#### 2.2 Área Personal y Navegación

El contenido dentro de tu área personal depende de tu rol o especialidad asignada. Por ejemplo:

  * **Amigurumis:** Cursos y patrones exclusivos.
  * **Bordados:** Materiales y tutoriales específicos.
  * **Bolsos:** Diseños y recursos relacionados.

#### 2.3 Descarga de Materiales

Algunos recursos están en formato PDF protegido. Para abrirlos, descarga el archivo y usa la clave de acceso que el sistema genera automáticamente y muestra junto al producto en tu área personal.

#### 2.4 Cierre de Sesión

Dentro de tu área privada, encontrarás un botón para **Cerrar Sesión**. Es importante que siempre lo uses para proteger tu cuenta y evitar accesos no autorizados.

### 3\. Guía para Administradores

#### 3.1 Acceso al Panel de Control

El acceso es privado y se realiza desde la URL especial `/secretadmin.php`. Este panel te da el control total para gestionar la plataforma.

#### 3.2 Gestión de Estudiantes

Desde el panel de control, puedes:

  * **Crear:** Agregar nuevos estudiantes y asignarles un rol y una contraseña.
  * **Editar:** Cambiar sus datos, contraseñas o roles.
  * **Eliminar:** Borrar un usuario del sistema.

#### 3.3 Gestión de Productos

  * **KV Sublimación:** Puedes agregar productos nuevos con su nombre, categoría, material, tamaño, precio e imagen.
  * **KV Tejido:** Además de la imagen del producto, puedes adjuntar un PDF protegido con contraseña. El sistema generará una clave aleatoria de 8 caracteres que el estudiante deberá usar para abrirlo.

#### 3.4 Personalización del Sitio

Desde el panel de control, también puedes configurar y personalizar la apariencia del portal:

  * Subir o cambiar logos e íconos.
  * Modificar los fondos de las páginas.
  * Agregar, editar o eliminar los enlaces a las redes sociales del centro.

### 4\. Preguntas Frecuentes (FAQ)

  * **Olvidé mi contraseña, ¿qué hago?**
    Contacta al administrador para que la restablezca desde el panel de control.
  * **¿Por qué necesito una clave de acceso para registrarme?**
    Esto garantiza que solo los estudiantes autorizados puedan acceder a su área de especialidad.
  * **No veo un producto en el catálogo, ¿por qué?**
    Es posible que el administrador lo haya desactivado u ocultado temporalmente.
  * **¿Cómo abro un PDF protegido?**
    Descarga el archivo desde tu área personal y usa la clave de acceso que aparece junto al producto.
  * **¿Cómo se protegen mis datos?**
    Las contraseñas se guardan encriptadas con **bcrypt**, y las sesiones se gestionan de manera segura en PHP.

-----

## ⚙️ Manual Técnico

### 1\. Introducción

El Portal del Centro Cultural Victoria es una aplicación web integral desarrollada para la promoción cultural y educativa. Su arquitectura es modular, permitiendo una gestión eficiente de sus tres áreas principales: público, estudiantes y administración. Funciona con una arquitectura cliente-servidor estándar.

### 2\. Arquitectura General del Sistema

El portal opera con un stack tecnológico clásico y probado:

  * **Servidor Web:** Apache/Nginx (con soporte para PHP 7.4+).
  * **Lenguajes:** PHP (backend), HTML5, CSS3, JavaScript (frontend).
  * **Base de Datos:** MySQL/MariaDB (5.7+).
  * **Librerías:** jQuery y AJAX para interactividad.
  * **Seguridad:** Manejo de sesiones, cifrado bcrypt y protección de PDFs.

#### Estructura de Directorios

El sistema está organizado en una estructura lógica para separar las funcionalidades:

```
├── /admin/
├── /Catalogos/
│   ├── /KVS/
│   └── /KVC/
├── /estudiante/
├── /includes/
├── /recursos/
├── .htaccess
├── pav.sql
└── secretadmin.php
```

### 3\. Base de Datos (MySQL)

La base de datos está diseñada para gestionar productos, usuarios y la personalización del sitio.

#### Estructura de Tablas

  * **Usuarios y Seguridad:** `usuarios`, `roles`.
  * **Productos:** `productosub`, `productostej`.
  * **Clasificación:** `categoriassub`, `materialessub`, `tamañomaterialsub`.
  * **Configuración:** `pagina`, `rutapagina`, `fondopagina`, `iconopagina`, `logopagina`, `redes`.

Las contraseñas de los usuarios se almacenan **hasheadas con `password_hash()` y bcrypt**.

### 4\. Backend (PHP)

El backend maneja la lógica de negocio, la manipulación de datos y la seguridad a través de sus módulos.

#### Módulos Principales

  * **Gestión de Estudiantes:** Un CRUD completo (`adminEstudiante.php`).
  * **Gestión de Productos:**
      * **Tejido:** CRUD (`adminKVC.php`) que sube imágenes y PDFs, generando una contraseña de 8 caracteres para los archivos protegidos.
      * **Sublimación:** CRUD (`adminKVS.php`) con validaciones para evitar duplicados.
  * **Gestión de Apariencia:** Módulos para editar fondos, íconos y logos (`adminExtra.php`).
  * **Gestión de Redes Sociales:** CRUD (`adminRedes.php`).
  * **Control de Sesiones:** El archivo `/includes/session.php` contiene funciones para verificar el estado de la sesión y los permisos de usuario.

### 5\. Frontend (HTML, CSS, JS)

El frontend es interactivo y responsive.

  * **Catálogos Públicos:** Usan **AJAX** para cargar y filtrar productos dinámicamente sin recargar la página.
  * **Área de Estudiantes:** Vistas personalizadas por rol que permiten la descarga de materiales protegidos.
  * **Panel de Administración:** Usa interfaces **AJAX** para las operaciones de gestión, con scripts JS dedicados.

### 6\. Seguridad del Sistema

El portal cuenta con varias capas de seguridad para proteger datos y contenido:

  * **Cifrado de Contraseñas:** Usando `password_hash()` y bcrypt.
  * **Protección de PDFs:** Los archivos se almacenan en una carpeta protegida y se asocian a una contraseña única.
  * **Restricciones de Interfaz:** Un script (`NC.js`) bloquea el clic derecho y las combinaciones de teclas de inspección del navegador para evitar la copia no autorizada.
  * **Validaciones:** Se realizan validaciones tanto en el cliente como en el servidor.

### 7\. Requisitos y Mantenimiento

#### Requisitos del Sistema

  * **Servidor:** Apache/Nginx con PHP 7.4+.
  * **Base de Datos:** MySQL 5.7+ o MariaDB.
  * **Extensiones PHP:** PDO, GD y Fileinfo.
  * **Cliente:** Navegador actualizado.

#### Procedimientos de Instalación

1.  Descarga y coloca el proyecto en tu servidor web.
2.  Configura las credenciales de la base de datos en `/includes/db.php`.
3.  Importa el archivo `pav.sql` en MySQL.
4.  Configura permisos de escritura en las carpetas de recursos y subida de archivos.
5.  Verifica y ajusta las rutas en los archivos de configuración.

#### Mantenimiento

  * Realiza **respaldos periódicos** de la base de datos y los archivos.
  * Rota las contraseñas de administración con frecuencia.
  * Revisa los logs de error de PHP.
  * Mantén actualizadas las versiones de PHP y las librerías.
