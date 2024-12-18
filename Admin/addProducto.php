<?php
include 'conexionBD.php';
include 'informacion_session.php';
session_start();

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    InsertarProducto();
}

function InsertarProducto()
{
    include 'conexionBD.php';
    // Obtener los valores del formulario y escapar los caracteres especiales
    $nombreProducto = mysqli_real_escape_string($conn, $_POST['nombreProducto']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $precio = mysqli_real_escape_string($conn, $_POST['precio']);
    $zona_origen = mysqli_real_escape_string($conn, $_POST['zona_origen']);
    $stock = mysqli_real_escape_string($conn, $_POST['stock']);
    $fecha_ingreso = date('Y-m-d'); // Año-Mes-Día en formato numérico

    // Consulta SQL
    $sql = "INSERT INTO `producto` (`nombreProducto`, `Descripcion`, `Precio`, `Zona_origen`, `StockDisponible`, `id_categoria`, `fecha_ingreso`)
    VALUES ('$nombreProducto', '$descripcion', '$precio', '$zona_origen', '$stock', 1, '$fecha_ingreso')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Producto agregado exitosamente.');   </script>";
    } else {
        echo "Error al agregar el producto: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Producto</title>
    <link rel="stylesheet" href="./CSS/DropdownMenu.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/JS/dropdownMenu.js"></script>
    <link rel="stylesheet" href="../CSS/addproduct.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="../Img/logo.jpg" alt="Tierra del Café">
            </div>
        </nav>
    </header>

    <div class="container">
        <h2>Agregar Nuevo Producto</h2>
        <form action="addProducto.php" method="POST">
            <div class="form-field">
                <label for="nombreProducto">Nombre del Producto:</label>
                <input type="text" id="nombreProducto" name="nombreProducto" required>
            </div>

            <div class="form-field">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>

            <div class="form-field">
                <label for="precio">Precio:</label>
                <input type="number" step="0.01" id="precio" name="precio" required>
            </div>

            <div class="form-field">
                <label for="zona_origen">Zona de Origen:</label>
                <input type="text" id="zona_origen" name="zona_origen" required>
            </div>

            <div class="form-field">
                <label for="stock">Stock Disponible:</label>
                <input type="number" id="stock" name="stock" required>
            </div>

            <input type="submit" value="Agregar Producto">
        </form>
    </div>
</body>

</html>
