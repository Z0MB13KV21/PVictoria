<?php
include '../../includes/session.php';
require_admin();
include '../../includes/db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['ids']) && is_array($data['ids'])) {
    foreach ($data['ids'] as $id) {
        // Obtener la red social a eliminar
        $stmt = $pdo->prepare("SELECT * FROM redes WHERE id = ?");
        $stmt->execute([$id]);
        $red_social = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($red_social) {
            // Eliminar el archivo del logo
            unlink('../../admin/recursos/redes/' . $red_social['logoRS']);

            // Eliminar la red social de la base de datos
            $stmt = $pdo->prepare("DELETE FROM redes WHERE id = ?");
            $stmt->execute([$id]);
        }
    }

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>
