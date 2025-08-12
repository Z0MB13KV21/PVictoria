<?php
include '../../includes/session.php'; // Ajustar la ruta
require_admin(); // Asegurarse de que el usuario tenga permisos de administrador
include '../../includes/db.php'; // Ajustar la ruta

// Obtener el ID del producto a editar
$productId = $_GET['id'];

try {
    // Consulta SQL para obtener los detalles del producto
    $stmt = $pdo->prepare("SELECT * FROM productosub WHERE id = ?");
    $stmt->execute([$productId]);
    $productDetails = $stmt->fetch(PDO::FETCH_ASSOC);

    // Consulta SQL para obtener el nombre de la categoría asociada al producto
    $stmt = $pdo->prepare("SELECT nombreCategoria FROM categoriassub WHERE id = ?");
    $stmt->execute([$productDetails['categoriaSub']]);
    $categoryName = $stmt->fetchColumn();

    // Consulta SQL para obtener el nombre del material asociado al producto
    $stmt = $pdo->prepare("SELECT nombreMaterial FROM materialessub WHERE id = ?");
    $stmt->execute([$productDetails['materialesSub']]);
    $materialName = $stmt->fetchColumn();

    // Consulta SQL para obtener el tamaño asociado al producto
    $stmt = $pdo->prepare("SELECT Tamaño FROM tamañomaterialsub WHERE id = ?");
    $stmt->execute([$productDetails['tamaño']]);
    $sizeName = $stmt->fetchColumn();

    // Construir el arreglo de respuesta con los detalles del producto y los nombres de categoría, material y tamaño
    $response = array(
        'productName' => $productDetails['nombreSub'],
        'productCategory' => array(
            'name' => $categoryName,
            'id' => $productDetails['categoriaSub']
        ),
        'productMaterial' => array(
            'name' => $materialName,
            'id' => $productDetails['materialesSub']
        ),
        'productSize' => array(
            'name' => $sizeName,
            'id' => $productDetails['tamaño']
        ),
        'productDescription' => $productDetails['descripcionSub'],
        'productPrice' => $productDetails['precioSub'],
        'productSpecifications' => $productDetails['Especificaciones'],
        'productImage' => $productDetails['Galeria'],
        'productActive' => $productDetails['activo']
    );

    // Retornar los detalles del producto como JSON
    echo json_encode($response);
} catch (PDOException $e) {
    // Manejar cualquier error de base de datos
    echo json_encode(["error" => $e->getMessage()]);
}
?>
