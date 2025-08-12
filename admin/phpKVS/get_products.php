<?php
include '../../includes/session.php'; // Ajustar la ruta
require_admin();
include '../../includes/db.php'; // Ajustar la ruta

try {
    $stmt = $pdo->prepare("SELECT * FROM productosub");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($products);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
