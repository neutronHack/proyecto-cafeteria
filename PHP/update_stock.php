<?php
// Configuración de la conexión con la base de datos
$servername = "localhost";
$username = "root"; // Usuario predeterminado en XAMPP
$password = "";     // La contraseña está vacía en XAMPP por defecto
$dbname = "cafeteria"; // Nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Recibir los datos del formulario
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

// Validar que la cantidad no sea negativa
if ($quantity < 0) {
    echo "La cantidad no puede ser negativa.";
} else {
    // Actualizar el stock en la base de datos
    $sql = "UPDATE productos SET stock = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $quantity, $product_id);
    
    // Ejecutar la consulta y verificar el resultado
    if ($stmt->execute()) {
        echo "Stock actualizado correctamente.";
    } else {
        echo "Error al actualizar el stock: " . $conn->error;
    }
    
    // Cerrar la declaración y la conexión
    $stmt->close();
}

// Cerrar la conexión a la base de datos
$conn->close();
?>