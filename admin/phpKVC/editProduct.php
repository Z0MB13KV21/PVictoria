<?php
include '../../includes/session.php';
require_admin();
include '../../includes/db.php';

// Obtener los datos del formulario
$id = $_POST['id'];
$nombreTej = $_POST['nombreTej'];
$pagina = $_POST['pagina'];
$descripcion = $_POST['descripcion'];
$tamano = $_POST['tamano'];
$precio = $_POST['precio'];
$contraseñaPDF = $_POST['contraseñaPDF']; // Nueva contraseña PDF

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
    // Verificar si el nombre del producto ya está en uso
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM productostej WHERE NombreTej = ? AND Id != ?");
    $stmt->execute([$nombreTej, $id]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        throw new Exception("El nombre del producto ya está en uso.");
    }

    // Obtener el producto actual de la base de datos
    $stmt = $pdo->prepare("SELECT NombreTej, Galeria, PDF FROM productostej WHERE Id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        throw new Exception("Producto no encontrado.");
    }

    $oldProductName = $product['NombreTej'];
    $oldProductImage = $product['Galeria'];
    $oldProductPdf = $product['PDF'];
    $newProductImage = null;
    $newProductPdf = null;

    // Subir nueva imagen si se proporciona
    if (!empty($_FILES['galeria']['name'][0])) {
        // Definir la ruta completa del archivo de imagen
        $newProductImageName = $nombreTej . "-KVC." . pathinfo($_FILES["galeria"]["name"][0], PATHINFO_EXTENSION);
        $targetFile = $targetDirImage . $newProductImageName;

        // Mover y renombrar el archivo
        if (move_uploaded_file($_FILES["galeria"]["tmp_name"][0], $targetFile)) {
            $newProductImage = $basePathForDbImage . $newProductImageName;
        } else {
            echo "Error al subir el archivo de imagen.";
            exit;
        }
    }

    // Renombrar el archivo de imagen existente si el nombre del producto ha cambiado y no se proporciona una nueva imagen
    if ($oldProductName !== $nombreTej && !$newProductImage && $oldProductImage) {
        $oldImagePath = $targetDirImage . $oldProductName . "-KVC." . pathinfo($oldProductImage, PATHINFO_EXTENSION);
        $newImagePath = $targetDirImage . $nombreTej . "-KVC." . pathinfo($oldProductImage, PATHINFO_EXTENSION);

        if (file_exists($oldImagePath)) {
            rename($oldImagePath, $newImagePath);
            $newProductImage = $basePathForDbImage . $nombreTej . "-KVC." . pathinfo($oldProductImage, PATHINFO_EXTENSION);
        } else {
            echo "La imagen anterior no se encontró. Por favor, sube una nueva imagen.";
            exit;
        }
    }

    // Si no se proporciona nueva imagen y no se necesita renombrar, mantener la imagen existente
    if (!$newProductImage) {
        $newProductImage = $oldProductImage;
    }

    // Subir nuevo archivo PDF si se proporciona
    if (!empty($_FILES['pdf']['name'])) {
        // Definir la ruta completa del archivo PDF
        $newProductPdfName = $nombreTej . "-KVC." . pathinfo($_FILES["pdf"]["name"], PATHINFO_EXTENSION);
        $targetPdfFile = $targetDirPdf . $newProductPdfName;

        // Mover y renombrar el archivo PDF
        if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $targetPdfFile)) {
            $newProductPdf = $basePathForDbPdf . $newProductPdfName;
        } else {
            echo "Error al subir el archivo PDF.";
            exit;
        }
    }

    // Renombrar el archivo PDF existente si el nombre del producto ha cambiado y no se proporciona un nuevo PDF
    if ($oldProductName !== $nombreTej && !$newProductPdf && $oldProductPdf) {
        $oldPdfPath = $targetDirPdf . $oldProductName . "-KVC." . pathinfo($oldProductPdf, PATHINFO_EXTENSION);
        $newPdfPath = $targetDirPdf . $nombreTej . "-KVC." . pathinfo($oldProductPdf, PATHINFO_EXTENSION);

        if (file_exists($oldPdfPath)) {
            rename($oldPdfPath, $newPdfPath);
            $newProductPdf = $basePathForDbPdf . $nombreTej . "-KVC." . pathinfo($oldProductPdf, PATHINFO_EXTENSION);
        } else {
            echo "El archivo PDF anterior no se encontró. Por favor, sube un nuevo archivo PDF.";
            exit;
        }
    }

    // Si no se proporciona nuevo PDF y no se necesita renombrar, mantener el PDF existente
    if (!$newProductPdf) {
        $newProductPdf = $oldProductPdf;
    }

    // Actualizar la contraseña PDF si se proporciona
    if (!empty($contraseñaPDF)) {
        // Actualizar la contraseña en la base de datos
        $stmt = $pdo->prepare("UPDATE productostej SET ContraseñaPDF = ? WHERE Id = ?");
        $stmt->execute([$contraseñaPDF, $id]);
    }

    // Actualizar los datos en la base de datos
    $stmt = $pdo->prepare("UPDATE productostej SET NombreTej = ?, Descripcion = ?, Precio = ?, Tamaño = ?, Galeria = ?, PDF = ?, Pagina = ? WHERE Id = ?");
    $stmt->execute([$nombreTej, $descripcion, $precio, $tamano, $newProductImage, $newProductPdf, $pagina, $id]);

    echo json_encode(["success" => "Producto actualizado exitosamente"]);
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}

// Función para obtener la carpeta correspondiente a la página
function get_page_folder($page) {
    $folders = ['amigurumis' => 'amigurumis', 'bordados' => 'bordados', 'bolsos' => 'bolsos'];
    return $folders[$page] ?? '';
}
?>
