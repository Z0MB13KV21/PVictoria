<?php
include '../../includes/session.php'; // Ajustar la ruta
require_admin();
include '../../includes/db.php'; // Ajustar la ruta

// Obtener los datos del formulario
$id = $_POST['selectStudent'];
$nombre = $_POST['editNombre'];
$apellido = $_POST['editApellido'];
$contraseña = password_hash($_POST['editContraseña'], PASSWORD_DEFAULT); // Hashear la contraseña
$rol = $_POST['editRol'];
$usuario = $_POST['editUsuario'];

try {
    // Consulta SQL para verificar si el nombre de usuario ya está en uso por otro usuario
    $query_disponibilidad = "SELECT COUNT(*) AS count FROM usuarios WHERE usuario = ? AND id != ?";
    $stmt_disponibilidad = $pdo->prepare($query_disponibilidad);
    $stmt_disponibilidad->execute([$usuario, $id]);
    $resultado_disponibilidad = $stmt_disponibilidad->fetch(PDO::FETCH_ASSOC);

    if ($resultado_disponibilidad['count'] > 0) {
        // Si el nombre de usuario ya está en uso, mostrar una alerta y salir del script
        echo 'El nombre de usuario ya está en uso. Por favor, elija otro.';
    } else {
        // Actualizar la información del estudiante en la base de datos
        $query = "UPDATE usuarios SET nombre = ?, apellido = ?, usuario = ?, contraseña = ?, rol = ? WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $resultado = $stmt->execute([$nombre, $apellido, $usuario, $contraseña, $rol, $id]);

        // Verificar si la actualización fue exitosa y mostrar un mensaje adecuado
        if ($resultado) {
            echo 'Estudiante editado exitosamente.';
        } else {
            echo 'Error al editar el estudiante.';
        }
    }
} catch (PDOException $e) {
    echo 'Error al ejecutar la consulta: ' . $e->getMessage();
}
?>
