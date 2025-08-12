<?php
session_start();

function is_logged_in() {
    return isset($_SESSION['usuario']);
}

function is_admin() {
    return isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin';
}

function require_login() {
    if (!is_logged_in()) {
        header('Location: ../estudiante.php');
        exit();
    }
}

function require_admin() {
    if (!is_admin()) {
        header('Location: ../secretadmin.php');
        exit();
    }
}
?>
