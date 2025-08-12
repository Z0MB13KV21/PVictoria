<?php
include '../../includes/session.php';
require_admin();
include '../../includes/db.php';

$id = $_POST['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM productostej WHERE Id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    echo json_encode(["success" => "Producto eliminado correctamente"]);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
