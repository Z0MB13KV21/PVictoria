<?php
include '../../includes/session.php';
require_admin();
include '../../includes/db.php';

// Obtener el ID del producto y el nuevo estado
$productId = isset($_POST['productId']) ? $_POST['productId'] : null;
$productActive = isset($_POST['productActive']) ? ($_POST['productActive'] === "activo" ? "activo" : "inactivo") : "inactivo";

try {
    // Actualizar el estado del producto en la base de datos
    $stmt = $pdo->prepare("UPDATE productosub SET activo = ? WHERE id = ?");
    $stmt->execute([$productActive, $productId]);

    // Retornar éxito
    echo "Estado del producto actualizado exitosamente";
} catch (Exception $e) {
    // Retornar error en caso de fallo
    echo "Error: " . $e->getMessage();
}
?>
