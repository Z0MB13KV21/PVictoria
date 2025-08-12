<?php
include '../../includes/session.php'; // Ajustar la ruta
require_admin();
include '../../includes/db.php'; // Ajustar la ruta

// Consulta SQL para seleccionar todos los estudiantes que no sean administradores
$query = "SELECT * FROM usuarios WHERE rol != 'admin'";
$stmt = $pdo->query($query);

// Crear la tabla HTML para mostrar los estudiantes
$table = '<table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>';

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $table .= '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['usuario'] . '</td>
                <td>' . $row['nombre'] . '</td>
                <td>' . $row['apellido'] . '</td>
                <td>' . $row['rol'] . '</td>
                <td>
                <button class="btn btn-sm btn-primary editar-estudiante" data-id="' . $row['id'] . '">Editar</button>
                    <button class="btn btn-sm btn-danger eliminar-estudiante" data-id="' . $row['id'] . '">Eliminar</button>
                </td>
            </tr>';
}

$table .= '</tbody></table>';

echo $table;
?>
