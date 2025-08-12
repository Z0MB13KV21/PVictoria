<?php
include '../../includes/session.php'; // Ajustar la ruta
require_admin();
include '../../includes/db.php'; // Ajustar la ruta

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['nuevo_icono']) && isset($_POST['pagina_id'])) {
    $pagina_id = $_POST['pagina_id'];
    $nuevo_icono = $_FILES['nuevo_icono'];

    if (!empty($nuevo_icono['name'])) {
        $stmt = $pdo->prepare("SELECT * FROM pagina WHERE id = ?");
        $stmt->execute([$pagina_id]);
        $pagina = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($pagina) {
            $extension = pathinfo($nuevo_icono['name'], PATHINFO_EXTENSION);
            $nuevo_nombre_icono = $pagina['nombrePagina'] . '-Icon.' . $extension;
            $ruta_directorio = '../../' . $pagina['rutaIconBack'];
            $ruta_icono = $ruta_directorio . '/' . $nuevo_nombre_icono;

            if (!is_dir($ruta_directorio)) {
                mkdir($ruta_directorio, 0755, true);
            }

            // Eliminar cualquier archivo existente con el mismo nombre y diferente extensión
            $icon_pattern = $ruta_directorio . '/' . $pagina['nombrePagina'] . '-Icon.*';
            array_map('unlink', glob($icon_pattern));

            if (move_uploaded_file($nuevo_icono['tmp_name'], $ruta_icono)) {
                header("Location: ../adminExtra.php");
                exit();
            } else {
                echo "Error al subir el icono.";
            }
        } else {
            echo "Página no encontrada.";
        }
    } else {
        echo "Por favor seleccione un archivo.";
    }
}
?>
