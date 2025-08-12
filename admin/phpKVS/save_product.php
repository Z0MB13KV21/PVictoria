<?php
include '../../includes/session.php'; // Ajustar la ruta
require_admin();
include '../../includes/db.php'; // Ajustar la ruta

// Obtener los datos del formulario
$productName = $_POST['productName'];
$productCategory = $_POST['productCategory'];
$productMaterial = $_POST['productMaterial'];
$productSize = $_POST['productSize'];
$productDescription = $_POST['productDescription'];
$productPrice = $_POST['productPrice'];
$productSpecifications = $_POST['productSpecifications'];

// Obtener el estado activo o inactivo
$productActive = isset($_POST['productActive']) ? "activo" : "inactivo";

// Definir la ruta del directorio de destino
$targetDir = "../../Catalogos/KVS/Recursos/";

// Verificar si el directorio de destino existe, si no, crearlo
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true); // Asegurarse de tener permisos de escritura
}

// Definir el nombre del archivo de imagen
$productImage = null;

// Subir imagen si se proporciona
if (!empty($_FILES['productImage']['name'])) {
    // Definir la ruta completa del archivo de imagen
    $targetFile = $targetDir . $productName . "-KVS." . pathinfo($_FILES["productImage"]["name"], PATHINFO_EXTENSION);
    // Mover y renombrar el archivo
    if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {
        // Modificar la ruta para almacenar en la base de datos
        $productImage = "Catalogos/KVS/Recursos/" . $productName . "-KVS." . pathinfo($_FILES["productImage"]["name"], PATHINFO_EXTENSION);
    } else {
        echo "Error al subir el archivo de imagen.";
        exit;
    }
}

// Insertar los datos en la base de datos
try {
    $stmt = $pdo->prepare("INSERT INTO productosub (nombreSub, descripcionSub, precioSub, tamaño, Especificaciones, categoriaSub, materialesSub, Galeria, activo)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$productName, $productDescription, $productPrice, $productSize, $productSpecifications, $productCategory, $productMaterial, $productImage, $productActive]);
    echo "Producto guardado exitosamente";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
