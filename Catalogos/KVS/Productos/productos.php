<?php
// Incluir archivo de conexión a la base de datos
include '../../../includes/db.php';

// Obtener la acción solicitada
$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action == 'getProducts') {
    // Obtener el valor de búsqueda y ajustar para la consulta SQL
    $search = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '%';

    // Obtener los filtros seleccionados
    $material = isset($_GET['material']) ? $_GET['material'] : '';
    $category = isset($_GET['category']) ? $_GET['category'] : '';
    $size = isset($_GET['size']) ? $_GET['size'] : '';

    // Construir la consulta SQL base
    $sql = "SELECT * FROM productosub WHERE activo = 'activo' AND nombreSub LIKE ?";

    // Agregar condiciones para los filtros seleccionados
    $params = [$search];
    if ($material !== '') {
        $sql .= " AND materialesSub = ?";
        $params[] = $material;
    }
    if ($category !== '') {
        $sql .= " AND categoriasub = ?";
        $params[] = $category;
    }
    if ($size !== '') {
        $sql .= " AND Tamaño = ?";
        $params[] = $size;
    }

    // Preparar y ejecutar la consulta SQL para obtener productos filtrados
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
