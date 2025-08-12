<?php
include '../../includes/session.php'; // Ajustar la ruta
require_admin();
include '../../includes/db.php'; // Ajustar la ruta

// Obtener los datos del formulario
$productId = $_POST['productId'];
$productName = $_POST['productName'];
$productCategory = $_POST['productCategory'];
$productMaterial = $_POST['productMaterial'];
$productSize = $_POST['productSize'];
$productDescription = $_POST['productDescription'];
$productPrice = $_POST['productPrice'];
$productSpecifications = $_POST['productSpecifications'];
$productActive = isset($_POST['productActive']) ? "activo" : "inactivo";

// Definir la ruta del directorio de destino
$targetDir = "../../Catalogos/KVS/Recursos/";
$basePathForDb = "Catalogos/KVS/Recursos/";

// Verificar si el directorio de destino existe, si no, crearlo
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true); // Asegurarse de tener permisos de escritura
}

try {
    // Obtener el producto actual de la base de datos
    $stmt = $pdo->prepare("SELECT nombreSub, Galeria FROM productosub WHERE id = ?");
    $stmt->execute([$productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        throw new Exception("Producto no encontrado.");
    }

    $oldProductName = $product['nombreSub'];
    $oldProductImage = $product['Galeria'];
    $newProductImage = null;

    // Subir nueva imagen si se proporciona
    if (!empty($_FILES['productImage']['name'])) {
        // Definir la ruta completa del archivo de imagen
        $newProductImageName = $productName . "-KVS." . pathinfo($_FILES["productImage"]["name"], PATHINFO_EXTENSION);
        $targetFile = $targetDir . $newProductImageName;
        
        // Mover y renombrar el archivo
        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {
            $newProductImage = $basePathForDb . $newProductImageName;
        } else {
            echo "Error al subir el archivo de imagen.";
            exit;
        }
    }

    // Renombrar el archivo de imagen existente si el nombre del producto ha cambiado y no se proporciona una nueva imagen
    if ($oldProductName !== $productName && !$newProductImage && $oldProductImage) {
        $oldImagePath = $targetDir . $oldProductName . "-KVS." . pathinfo($oldProductImage, PATHINFO_EXTENSION);
        $newImagePath = $targetDir . $productName . "-KVS." . pathinfo($oldProductImage, PATHINFO_EXTENSION);
        
        if (file_exists($oldImagePath)) {
            rename($oldImagePath, $newImagePath);
            $newProductImage = $basePathForDb . $productName . "-KVS." . pathinfo($oldProductImage, PATHINFO_EXTENSION);
        } else {
            echo "La imagen anterior no se encontró. Por favor, sube una nueva imagen.";
            exit;
        }
    }

    // Si no se proporciona nueva imagen y no se necesita renombrar, mantener la imagen existente
    if (!$newProductImage) {
        $newProductImage = $oldProductImage;
    }

    // Actualizar los datos en la base de datos
    $stmt = $pdo->prepare("UPDATE productosub SET nombreSub = ?, descripcionSub = ?, precioSub = ?, tamaño = ?, Especificaciones = ?, categoriaSub = ?, materialesSub = ?, Galeria = ?, activo = ? WHERE id = ?");
    $stmt->execute([$productName, $productDescription, $productPrice, $productSize, $productSpecifications, $productCategory, $productMaterial, $newProductImage, $productActive, $productId]);

    echo "Producto actualizado exitosamente";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
