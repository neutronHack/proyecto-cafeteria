<?php

include 'conexionBD.php';

// Formdan gelen verileri işle
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_producto = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $stock = $_POST['stock'];

    // Görüntü dosyasını kontrol et
    $imagen = null;
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen = 'uploads/' . basename($_FILES['imagen']['name']);
        move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen);
    }

    // Güncelleme sorgusu
    $sql = "UPDATE productos SET 
                nombre = ?, 
                precio = ?, 
                descripcion = ?, 
                categoria = ?, 
                stock = ?";
    $params = [$nombre, $precio, $descripcion, $categoria, $stock];

    if ($imagen) {
        $sql .= ", imagen = ?";
        $params[] = $imagen;
    }

    $sql .= " WHERE id = ?";
    $params[] = $id_producto;

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param(str_repeat('s', count($params) - 1) . 'i', ...$params);

    if ($stmt->execute()) {
        echo "Producto actualizado con éxito.";
    } else {
        echo "Error al actualizar el producto: " . $conexion->error;
    }
}
?>