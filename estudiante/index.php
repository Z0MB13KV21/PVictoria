<?php
include '../includes/session.php';
require_login(); // Requiere que el usuario esté logueado

// Redirige a la página correspondiente según el rol del usuario
switch ($_SESSION['rol']) {
    case 'amigurumis':
        header('Location: amigurumis.php');
        exit();
    case 'crochet':
        header('Location: bordados.php');
        exit();
    case 'bolsos':
        header('Location: bolsos.php');
        exit();
    default:
        // Si el rol no está definido, redirige a la página de inicio de sesión
        header('Location: ../estudiante.php');
        exit();
}
?>
