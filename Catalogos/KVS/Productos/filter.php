<?php
// Incluir archivo de conexión a la base de datos
include '../../../includes/db.php';

// Obtener la acción solicitada
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Acción para obtener productos con filtros
if ($action == 'getProducts') {
    // Obtener el valor de búsqueda y ajustar para la consulta SQL
    $search = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '%';
    // Obtener los valores de los filtros
    $material = isset($_GET['material']) ? $_GET['material'] : '';
    $category = isset($_GET['category']) ? $_GET['category'] : '';
    $size = isset($_GET['size']) ? $_GET['size'] : '';

    // Preparar la consulta SQL para obtener productos filtrados
    $sql = "SELECT productosub.*, tamañomaterialsub.Tamaño, categoriassub.nombreCategoria, materialessub.nombreMaterial 
            FROM productosub 
            LEFT JOIN tamañomaterialsub ON productosub.tamaño = tamañomaterialsub.ID 
            LEFT JOIN categoriassub ON productosub.categoriasub = categoriassub.ID 
            LEFT JOIN materialessub ON productosub.materialesSub = materialessub.ID 
            WHERE productosub.activo = 'activo' 
            AND (productosub.nombreSub LIKE ? OR productosub.descripcionSub LIKE ?)";

    // Agregar condiciones de filtrado según los valores recibidos
    $params = array($search, $search);
    if (!empty($material)) {
        $sql .= " AND materialessub.nombreMaterial = ?";
        $params[] = $material;
    }
    if (!empty($category)) {
        $sql .= " AND categoriassub.nombreCategoria = ?";
        $params[] = $category;
    }
    if (!empty($size)) {
        $sql .= " AND tamañomaterialsub.Tamaño = ?";
        $params[] = $size;
    }

    // Preparar y ejecutar la consulta SQL
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    // Obtener los resultados de la consulta
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Devolver los productos como JSON
    echo json_encode($products);
}

// Acción para obtener filtros
if ($action == 'getFilters') {
    // Consultar los materiales disponibles
    $materialsStmt = $pdo->query("SELECT nombreMaterial FROM materialessub");
    $materials = $materialsStmt->fetchAll(PDO::FETCH_COLUMN);

    // Consultar las categorías disponibles
    $categoriesStmt = $pdo->query("SELECT nombreCategoria FROM categoriassub");
    $categories = $categoriesStmt->fetchAll(PDO::FETCH_COLUMN);

    // Consultar los tamaños disponibles
    $sizesStmt = $pdo->query("SELECT Tamaño FROM tamañomaterialsub");
    $sizes = $sizesStmt->fetchAll(PDO::FETCH_COLUMN);

    // Combinar los filtros en un array
    $filters = [
        'materials' => $materials,
        'categories' => $categories,
        'sizes' => $sizes,
    ];

    // Devolver los filtros como JSON
    echo json_encode($filters);
}

// Acción para obtener redes sociales
if ($action == 'getSocialMedia') {
    // Consultar las redes sociales asociadas a KV Sublimación
    $stmt = $pdo->prepare("SELECT * FROM redes WHERE pagina = 'KV Sublimación'");
    $stmt->execute();
    $socialMedia = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Devolver las redes sociales como JSON
    echo json_encode($socialMedia);
}
?>
