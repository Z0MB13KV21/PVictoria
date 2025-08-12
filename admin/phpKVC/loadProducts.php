<?php
include '../../includes/session.php';
require_admin();
include '../../includes/db.php';

$page = isset($_GET['page']) ? $_GET['page'] : '';

try {
    $query = "SELECT * FROM productostej";
    if ($page) {
        $query .= " WHERE Pagina = :pagina";
    }
    $stmt = $pdo->prepare($query);

    if ($page) {
        $stmt->bindParam(':pagina', $page, PDO::PARAM_STR);
    }

    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($products as $product) {
        echo '<div class="col-md-4">';
        echo '<div class="card mb-2">';
        echo '<img src="' . generateGaleriaPath($product['Pagina'], $product['Galeria']) . '" class="card-img-top" alt="...">';
        echo '<div class="card-body">';
        echo '<h2 class="card-title">' . $product['NombreTej'] . '</h2>';
        echo '<p class="card-text"><strong>Acceso:</strong> ' . $product['ContraseñaPDF'] . '</p>';
        echo '<p class="card-text"><strong>Precio:</strong> ₡' . $product['Precio'] . '</p>';
        
   // Botón para cambiar estado activo/inactivo
echo '<button class="btn btn-primary change-product-status change-product-status-active ' . ($product['Activo'] === 'activo' ? 'active' : 'inactive') . '" data-id="' . $product['Id'] . '" data-status="' . ($product['Activo'] === 'activo' ? 'inactivo' : 'activo') . '">' . ($product['Activo'] === 'activo' ? 'Desactivar' : 'Activar') . '</button>';

// Botón para cambiar estado mostrar/ocultar
echo '<button class="btn btn-warning change-product-status change-product-status-show ' . ($product['Mostrar'] === 'mostrar' ? 'active' : 'inactive') . '" data-id="' . $product['Id'] . '" data-status="' . ($product['Mostrar'] === 'mostrar' ? 'ocultar' : 'mostrar') . '">' . ($product['Mostrar'] === 'mostrar' ? 'Ocultar' : 'Mostrar') . '</button>';

        
        // Botón para editar producto
        echo '<button class="btn btn-info edit-product" data-id="' . $product['Id'] . '">Editar</button>';
        // Botón para eliminar producto
        echo '<button class="btn btn-danger delete-product" data-id="' . $product['Id'] . '">Eliminar</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}

function generateGaleriaPath($page, $file) {
    $basePath = "kv/Catalogos/KVC/";
    $pagePaths = ['amigurumis' => 'amigurumis', 'bordados' => 'bordados', 'bolsos' => 'bolsos'];
    if (!isset($pagePaths[$page])) {
        return '';
    }
    return  "../".$file;
}

function generatePdfPath($page, $file) {
    $basePath = "kv/Catalogos/KVC/";
    $pagePaths = ['amigurumis' => 'amigurumis', 'bordados' => 'bordados', 'bolsos' => 'bolsos'];
    if (!isset($pagePaths[$page])) {
        return '';
    }
    return  "../".$file;
}

?>
