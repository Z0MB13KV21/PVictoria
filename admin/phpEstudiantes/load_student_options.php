<?php
include '../../includes/session.php'; // Ajustar la ruta
require_admin();
include '../../includes/db.php'; // Ajustar la ruta

// Consulta SQL para seleccionar todos los estudiantes que no sean administradores
$query = "SELECT id, CONCAT(nombre, ' ', apellido) AS nombre_completo, usuario FROM usuarios WHERE rol != 'admin'";
$stmt = $pdo->query($query);

$options = '<option value="" selected disabled>Seleccionar Estudiante</option>';

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $options .= '<option value="' . $row['id'] . '">' . $row['nombre_completo'] . ' (' . $row['usuario'] . ')' . '</option>';
}

echo $options;
?>
