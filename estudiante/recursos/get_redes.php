<?php
// Incluir archivo de conexión a la base de datos
include '../../includes/db.php';

// Consulta para obtener las redes sociales con el valor "Estudiante" en la columna página
$sql = "SELECT * FROM redes WHERE pagina = 'Estudiante'";
$stmt = $pdo->query($sql);

// Array para almacenar las redes sociales
$redes_sociales = [];

// Iterar sobre los resultados y almacenarlos en el array
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $redes_sociales[] = $row;
}

// Devolver los resultados como JSON
echo json_encode($redes_sociales);
?>
