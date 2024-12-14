<?php
include 'conexionBD.php';
include 'informacion_session.php';
session_start();

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
        echo "<script>alert(Producto agregado exitosamente.);   </script>";
    } else {
        echo "Error al agregar el producto: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}

InsertarProducto();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Producto</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2e8cf; /* Color café claro */
            color: #5c4033; /* Color marrón oscuro */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Contenedor principal */
        .container {
            background-color: #fff8e1; /* Fondo beige */
            border: 1px solid #d1b898;
            border-radius: 10px;
            padding: 20px 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #8b5a2b; /* Color café oscuro */
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #d1b898;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #8b5a2b; /* Resalta el borde al enfocar */
        }

        input[type="submit"] {
            background-color: #8b5a2b; /* Botón café */
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #6e4021; /* Color más oscuro al pasar el ratón */
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Agregar Nuevo Producto</h2>
        <form action="addProducto.php" method="POST">
            <label for="nombreProducto">Nombre del Producto:</label>
            <input type="text" id="nombreProducto" name="nombreProducto" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required></textarea>

            <label for="precio">Precio:</label>
            <input type="number" step="0.01" id="precio" name="precio" required>

            <label for="zona_origen">Zona de Origen:</label>
            <input type="text" id="zona_origen" name="zona_origen" required>

            <label for="stock">Stock Disponible:</label>
            <input type="number" id="stock" name="stock" required>

            <input type="submit" value="Agregar Producto">
        </form>
    </div>
</body>

</html>
