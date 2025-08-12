<?php
include '../../includes/session.php'; // Ajustar la ruta
require_admin();
include '../../includes/db.php'; // Ajustar la ruta

try {
    // Consulta SQL para obtener los datos de las tres tablas
    $sql_categorias = "SELECT * FROM categoriassub";
    $sql_materiales = "SELECT * FROM materialessub";
    $sql_tamaños = "SELECT * FROM tamañomaterialsub";

    // Ejecutar consultas
    $result_categorias = $pdo->query($sql_categorias);
    $categorias = $result_categorias->fetchAll(PDO::FETCH_ASSOC);

    $result_materiales = $pdo->query($sql_materiales);
    $materiales = $result_materiales->fetchAll(PDO::FETCH_ASSOC);

    $result_tamaños = $pdo->query($sql_tamaños);
    $tamaños = $result_tamaños->fetchAll(PDO::FETCH_ASSOC);

    // Retornar datos en formato JSON
    $data = array(
        'categorias' => $categorias,
        'materiales' => $materiales,
        'tamaños' => $tamaños
    );

    echo json_encode($data);
} catch (PDOException $e) {
    die("Error al obtener datos: " . $e->getMessage());
}
?>
