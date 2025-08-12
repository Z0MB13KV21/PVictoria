<?php
include '../../includes/session.php';
require_admin();
include '../../includes/db.php';

// Verificar si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombreTej = $_POST['nombreTej'];
    $pagina = $_POST['pagina'];
    $descripcion = $_POST['descripcion'];
    $tamano = $_POST['tamano'];
    $precio = $_POST['precio'];
    $contraseñaPDF = generar_contraseña_pdf(); // Generar la contraseña PDF
    $activo = 'activo'; // Valor predeterminado para "Activo"
    $mostrar = 'mostrar'; // Valor predeterminado para "Mostrar"

    // Verificar si el producto ya existe en la base de datos
    $stmt_check_product = $pdo->prepare("SELECT NombreTej FROM productostej WHERE NombreTej = ?");
    $stmt_check_product->execute([$nombreTej]);
    $existing_product = $stmt_check_product->fetchColumn();

    if ($existing_product) {
        echo json_encode(["error" => "El producto ya existe en la base de datos"]);
        exit(); // Terminar el script si el producto ya existe
    }

    // Definir las rutas base del directorio de destino según la página
    $targetDirImage = "../../Catalogos/KVC/" . get_page_folder($pagina) . "/recursos/";
    $basePathForDbImage = "Catalogos/KVC/" . get_page_folder($pagina) . "/recursos/";

    $targetDirPdf = "../../Catalogos/KVC/" . get_page_folder($pagina) . "/down/";
    $basePathForDbPdf = "Catalogos/KVC/" . get_page_folder($pagina) . "/down/";

    // Verificar si el directorio de destino existe, si no, crearlo
    if (!file_exists($targetDirImage)) {
        mkdir($targetDirImage, 0777, true);
    }

    if (!file_exists($targetDirPdf)) {
        mkdir($targetDirPdf, 0777, true);
    }

    try {
        // Iniciar una transacción
        $pdo->beginTransaction();

        // Subir nueva imagen si se proporciona
        if (!empty($_FILES['galeria']['name'][0])) {
            // Aquí manejas la subida de imágenes
            // Definir la ruta completa del archivo de imagen
            $newProductImageName = $nombreTej . "-KVC." . pathinfo($_FILES["galeria"]["name"][0], PATHINFO_EXTENSION);
            $targetFile = $targetDirImage . $newProductImageName;

            // Mover y renombrar el archivo
            if (move_uploaded_file($_FILES["galeria"]["tmp_name"][0], $targetFile)) {
                $newProductImage = $basePathForDbImage . $newProductImageName;
            } else {
                throw new Exception("Error al subir el archivo de imagen.");
            }
        } else {
            $newProductImage = null; // No se proporcionó una imagen
        }

        // Subir nuevo archivo PDF si se proporciona
        if (!empty($_FILES['pdf']['name'])) {
            // Aquí manejas la subida de archivos PDF
            // Definir la ruta completa del archivo PDF
            $newProductPdfName = $nombreTej . "-KVC." . pathinfo($_FILES["pdf"]["name"], PATHINFO_EXTENSION);
            $targetPdfFile = $targetDirPdf . $newProductPdfName;

            // Mover y renombrar el archivo PDF
            if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $targetPdfFile)) {
                $newProductPdf = $basePathForDbPdf . $newProductPdfName;
            } else {
                throw new Exception("Error al subir el archivo PDF.");
            }
        } else {
            $newProductPdf = null; // No se proporcionó un archivo PDF
        }

        // Insertar los datos en la tabla 'productostej' con las rutas de las imágenes y PDF
        $stmt = $pdo->prepare("INSERT INTO productostej (NombreTej, Descripcion, Precio, Tamaño, Galeria, PDF, Pagina, ContraseñaPDF, Activo, Mostrar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nombreTej, $descripcion, $precio, $tamano, $newProductImage, $newProductPdf, $pagina, $contraseñaPDF, $activo, $mostrar]);

        // Confirmar la transacción
        $pdo->commit();

        echo json_encode(["success" => "Producto añadido exitosamente"]);
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $pdo->rollBack();
        echo json_encode(["error" => $e->getMessage()]);
    }
} else {
    // Si no se han enviado datos por POST, mostrar un mensaje de error
    echo json_encode(["error" => "No se han enviado datos por POST"]);
}

// Función para obtener la carpeta correspondiente a la página
function get_page_folder($page) {
    $folders = ['amigurumis' => 'amigurumis', 'bordados' => 'bordados', 'bolsos' => 'bolsos'];
    return $folders[$page] ?? '';
}

// Función para generar la contraseña PDF
function generar_contraseña_pdf() {
    $caracteres_permitidos = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $longitud_contraseña = 8;
    $contraseña = '';
    for ($i = 0; $i < $longitud_contraseña; $i++) {
        $indice_caracter = rand(0, strlen($caracteres_permitidos) - 1);
        $contraseña .= $caracteres_permitidos[$indice_caracter];
    }
    return $contraseña;
}
?>
