<?php
include '../../includes/session.php';
require_admin();
include '../../includes/db.php';

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("SELECT * FROM productostej WHERE Id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($product);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
