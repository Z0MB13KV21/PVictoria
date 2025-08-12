<?php
include '../../includes/session.php';
require_admin();
include '../../includes/db.php';

$id = $_POST['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
    echo "Estudiante eliminado exitosamente.";
} catch (PDOException $e) {
    echo 'Error al ejecutar la consulta: ' . $e->getMessage();
}
?>