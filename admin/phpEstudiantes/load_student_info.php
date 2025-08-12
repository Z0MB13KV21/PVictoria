<?php
include '../../includes/session.php'; // Ajustar la ruta
require_admin();
include '../../includes/db.php'; // Ajustar la ruta

// Verificar si se proporcionó un ID de estudiante
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo json_encode(array('error' => 'ID de estudiante no proporcionado'));
    exit; // Detener la ejecución del script
}

// Obtener y limpiar el ID del estudiante
$studentId = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

// Validar que el ID del estudiante sea un entero positivo
if (!filter_var($studentId, FILTER_VALIDATE_INT) || $studentId <= 0) {
    echo json_encode(array('error' => 'ID de estudiante no válido'));
    exit; // Detener la ejecución del script
}

// Consulta SQL para seleccionar la información del estudiante (excluyendo la contraseña)
$query = "SELECT id, usuario, nombre, apellido, rol FROM usuarios WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute(['id' => $studentId]);
$studentInfo = $stmt->fetch(PDO::FETCH_ASSOC);

// Convertir la información del estudiante a formato JSON y enviarla
echo json_encode($studentInfo);
?>
