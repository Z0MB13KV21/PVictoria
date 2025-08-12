<?php
include '../../includes/session.php';
require_admin();
include '../../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_social'])) {
    $id = $_POST['id'];
    $nombreRS = $_POST['nombreRS'];
    $pagina = $_POST['pagina'];
    $enlace = $_POST['enlace'];
    $logoRS = $_FILES['logoRS'];

    // Validar que todos los campos estén completos
    if (!empty($id) && !empty($nombreRS) && !empty($pagina) && !empty($enlace)) {
        // Obtener los datos actuales de la red social
        $stmt = $pdo->prepare("SELECT * FROM redes WHERE id = ?");
        $stmt->execute([$id]);
        $red_social = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($red_social) {
            // Si se subió un nuevo logo, actualizarlo
            if (!empty($logoRS['name'])) {
                $extension = pathinfo($logoRS['name'], PATHINFO_EXTENSION);
                $nuevo_nombre_logo = $nombreRS . ($pagina == "Estudiante" ? "est" : ($pagina == "KV Sublimación" ? "KVS" : "KVC")) . '.' . $extension;
                $ruta_logo = '../../admin/recursos/redes/' . $nuevo_nombre_logo;

                // Mover el archivo subido a la ruta especificada
                if (move_uploaded_file($logoRS['tmp_name'], $ruta_logo)) {
                    // Eliminar el logo anterior si es diferente
                    if ($red_social['logoRS'] != $nuevo_nombre_logo) {
                        unlink('../../admin/recursos/redes/' . $red_social['logoRS']);
                    }
                } else {
                    echo "Error al subir el logo.";
                    exit();
                }
            } else {
                // Mantener el logo actual
                $nuevo_nombre_logo = $red_social['logoRS'];
            }

            // Actualizar la red social en la base de datos
            $stmt = $pdo->prepare("UPDATE redes SET nombreRS = ?, pagina = ?, enlace = ?, logoRS = ? WHERE id = ?");
            $stmt->execute([$nombreRS, $pagina, $enlace, $nuevo_nombre_logo, $id]);
            header("Location: ../adminRedes.php");
            exit();
        } else {
            echo "Red social no encontrada.";
        }
    } else {
        echo "Por favor complete todos los campos.";
    }
}
?>
