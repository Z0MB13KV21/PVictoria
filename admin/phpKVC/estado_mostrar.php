<?php
include '../../includes/session.php';
require_admin();
include '../../includes/db.php';

// Obtener el ID del producto y el nuevo estado
$productId = isset($_POST['productId']) ? $_POST['productId'] : null;
$productShow = isset($_POST['productShow']) ? ($_POST['productShow'] === "mostrar" ? "mostrar" : "ocultar") : "ocultar";

try {
    // Actualizar el campo "Mostrar" del producto en la base de datos
    $stmt = $pdo->prepare("UPDATE productostej SET mostrar = ? WHERE id = ?");
    $stmt->execute([$productShow, $productId]);

    // Retornar éxito
    echo "Estado 'Mostrar' del producto actualizado exitosamente";
} catch (Exception $e) {
    // Retornar error en caso de fallo
    echo "Error: " . $e->getMessage();
}
?>
