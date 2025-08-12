<?php
include '../../includes/session.php';
require_admin();
include '../../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_social'])) {
    $nombreRS = $_POST['nombreRS'];
    $pagina = $_POST['pagina'];
    $enlace = $_POST['enlace'];
    $logoRS = $_FILES['logoRS'];

    // Validar que todos los campos estén completos
    if (!empty($nombreRS) && !empty($pagina) && !empty($enlace) && !empty($logoRS['name'])) {
        // Validar si ya existe una red social con el mismo nombre para la misma página
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM redes WHERE nombreRS = ? AND pagina = ?");
        $stmt->execute([$nombreRS, $pagina]);
        if ($stmt->fetchColumn() > 0) {
            echo "Ya existe una red social con el mismo nombre para la misma página.";
            exit;
        }

        // Guardar el logo en la carpeta correspondiente
        $extension = pathinfo($logoRS['name'], PATHINFO_EXTENSION);
        $nuevo_nombre_logo = $nombreRS . ($pagina == "Estudiante" ? "est" : ($pagina == "KV Sublimación" ? "KVS" : "KVC")) . '.' . $extension;
        $ruta_logo = '../../admin/recursos/redes/' . $nuevo_nombre_logo;

        // Mover el archivo subido a la ruta especificada
        if (move_uploaded_file($logoRS['tmp_name'], $ruta_logo)) {
            // Insertar la nueva red social en la base de datos
            $stmt = $pdo->prepare("INSERT INTO redes (nombreRS, pagina, enlace, logoRS) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nombreRS, $pagina, $enlace, $nuevo_nombre_logo]);

            header("Location: ../adminRedes.php");
            exit();
        } else {
            echo "Error al subir el logo.";
        }
    } else {
        echo "Por favor complete todos los campos.";
    }
}
?>
