<?php
session_start();

// Verifica si los datos fueron enviados por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productos = json_decode($_POST['productos'], true); // Decodificar el JSON
    $total = $_POST['total'];

    // Guarda en variables de sesión
    $_SESSION['productos_select'] = $productos;
    $_SESSION['total'] = $total;

    // Prueba: Muestra los datos guardados
    echo "<pre>";
    print_r($_SESSION['productos_select']);
    echo "Total: $" . $_SESSION['total'];
    echo "</pre>";
}
?>
