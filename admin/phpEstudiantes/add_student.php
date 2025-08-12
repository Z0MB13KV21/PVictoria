<?php
include '../../includes/session.php';
require_admin();
include '../../includes/db.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
$rol = $_POST['rol'];

try {
    // Verificar si el usuario ya existe en la base de datos
    $stmt_disponibilidad = $pdo->prepare("SELECT COUNT(*) AS count FROM usuarios WHERE usuario = ?");
    $stmt_disponibilidad->execute([$usuario]);
    $resultado_disponibilidad = $stmt_disponibilidad->fetch(PDO::FETCH_ASSOC);

    // Si el usuario ya existe, mostrar una alerta y salir del script
    if ($resultado_disponibilidad['count'] > 0) {
        echo 'El nombre de usuario ya está en uso. Por favor, elige otro.';
        exit; // Salir del script
    }

    // Si el usuario no existe, proceder con la inserción
    $hashed_password = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, nombre, apellido, contraseña, rol) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$usuario, $nombre, $apellido, $hashed_password, $rol]);
    echo 'Estudiante agregado exitosamente.';
} catch (PDOException $e) {
    echo 'Error al agregar el estudiante: ' . $e->getMessage();
}
?>
