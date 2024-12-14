<?php
// Veritabanı bağlantısını dahil et
include("conexionBD.php");

// Formun gönderilip gönderilmediğini kontrol et
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form verilerini al ve doğrula
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $precio = floatval($_POST['precio']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $categoria = mysqli_real_escape_string($conexion, $_POST['categoria']);
    $stock = intval($_POST['stock']);
    
    // Resim işlemleri
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagenTmpPath = $_FILES['imagen']['tmp_name'];
        $imagenNombre = basename($_FILES['imagen']['name']);
        $imagenDestino = "uploads/" . $imagenNombre;

        
        if (move_uploaded_file($imagenTmpPath, $imagenDestino)) {
            // Veritabanına ekle
            $sql = "INSERT INTO productos (nombre, precio, descripcion, categoria, imagen, stock)
                    VALUES ('$nombre', $precio, '$descripcion', '$categoria', '$imagenDestino', $stock)";
            if (mysqli_query($conexion, $sql)) {
                echo "Producto añadido correctamente."; 
            } else {
                echo "Error al guardar el producto: " . mysqli_error($conexion);
            }
        } else {
            echo "Error al subir la imagen."; // Resim yüklenemedi
        }
    } else {
        echo "Por favor, selecciona una imagen válida."; // Geçerli bir resim seçin
    }
} else {
    echo "Método no permitido."; // Geçersiz istek yöntemi
}
?>