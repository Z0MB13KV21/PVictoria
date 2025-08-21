<?php
// Incluir archivo de conexión a la base de datos
include '../../includes/db.php';

// Obtener el término de búsqueda de la solicitud GET
$search = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '';

// Establecer la página por defecto a "bolsos"
$page = 'amigurumis';

try {
    // Construir la consulta SQL para obtener productos
    $query = "SELECT Id, NombreTej, Pagina, Descripcion, Tamaño, Precio, Galeria, Pdf, ContraseñaPDF, Mostrar FROM productostej WHERE Mostrar = 'Mostrar'";
    
    // Agregar filtro de página
    $query .= " AND Pagina = :page";
    
    // Agregar filtro de búsqueda si se proporciona un término de búsqueda
    if (!empty($search)) {
        $query .= " AND NombreTej LIKE :search";
    }

    // Preparar la consulta
    $stmt = $pdo->prepare($query);

    // Vincular parámetros de página
    $stmt->bindParam(':page', $page, PDO::PARAM_STR);

    // Vincular parámetros si hay un término de búsqueda
    if (!empty($search)) {
        $stmt->bindParam(':search', $search, PDO::PARAM_STR);
    }

    // Ejecutar la consulta
    $stmt->execute();
    
    // Obtener los productos
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Agregar la ruta de la galería a cada producto
    foreach ($products as &$product) {
        $product['GaleriaPath'] = generateGaleriaPath($product['Pagina'], $product['Galeria']);
    }

    // Devolver los productos como JSON
    echo json_encode($products);

} catch (PDOException $e) {
    // Manejar errores de la base de datos
    echo json_encode(["error" => $e->getMessage()]);
}

// Función para generar la ruta de la galería
function generateGaleriaPath($page, $file) {
    $basePath = "../KVC/";
    $pagePaths = ['amigurumis' => 'amigurumis', 'bordados' => 'bordados', 'bolsos' => 'bolsos'];
    if (!isset($pagePaths[$page])) {
        return '';
    }
    return "../" . $file;
}
?>

