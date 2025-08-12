<?php
include '../../includes/session.php';
require_admin();
include '../../includes/db.php';

$id = $_POST['id'];

try {
    // Obtener la ruta de la imagen del producto antes de eliminar el registro
    $stmt = $pdo->prepare("SELECT Galeria FROM productosub WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($product) {
        // Eliminar la imagen asociada si existe
        $imagePath = '../../' . $product['Galeria'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Eliminar el registro del producto
        $stmt = $pdo->prepare("DELETE FROM productosub WHERE id = ?");
        $stmt->execute([$id]);
        echo json_encode(['success' => true, 'message' => 'Producto eliminado exitosamente']);
    } else {
        echo json_encode(['error' => 'Producto no encontrado']);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
