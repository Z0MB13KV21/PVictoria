<?php
include '../../includes/session.php'; // Ajustar la ruta
require_admin();
include '../../includes/db.php'; // Ajustar la ruta

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['nuevo_fondo']) && isset($_POST['pagina_id'])) {
    $pagina_id = $_POST['pagina_id'];
    $nuevo_fondo = $_FILES['nuevo_fondo'];

    if (!empty($nuevo_fondo['name'])) {
        $stmt = $pdo->prepare("SELECT * FROM pagina WHERE id = ?");
        $stmt->execute([$pagina_id]);
        $pagina = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($pagina) {
            $extension = pathinfo($nuevo_fondo['name'], PATHINFO_EXTENSION);
            $nuevo_nombre_fondo = $pagina['nombrePagina'] . '-Back.' . $extension;
            $ruta_directorio = '../../' . $pagina['rutaIconBack'];
            $ruta_fondo = $ruta_directorio . '/' . $nuevo_nombre_fondo;

            if (!is_dir($ruta_directorio)) {
                mkdir($ruta_directorio, 0755, true);
            }

            // Eliminar cualquier archivo existente con el mismo nombre y diferente extensión
            $fondo_pattern = $ruta_directorio . '/' . $pagina['nombrePagina'] . '-Back.*';
            array_map('unlink', glob($fondo_pattern));

            if (move_uploaded_file($nuevo_fondo['tmp_name'], $ruta_fondo)) {
                header("Location: ../adminExtra.php");
                exit();
            } else {
                echo "Error al subir el fondo.";
            }
        } else {
            echo "Página no encontrada.";
        }
    } else {
        echo "Por favor seleccione un archivo.";
    }
}
?>
