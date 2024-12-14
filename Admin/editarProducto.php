<?php
include 'conexionBD.php'; // Archivo de conexión a la base de datos
session_start();


if (isset($_GET['id_producto'])) {
    $id = $_GET['id_producto'];

    // Obtener los datos del producto
    $sql = "SELECT * FROM producto WHERE id_producto = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $producto = $result->fetch_assoc();
    } else {
        echo "Producto no encontrado.";
        exit();
    }
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2e8cf;
            color: #5c4033;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #8b5a2b;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #fff8e1;
        }

        th, td {
            border: 1px solid #d1b898;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #8b5a2b;
            color: white;
        }

        a {
            text-decoration: none;
            color: white;
            background-color: #8b5a2b;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        a:hover {
            background-color: #6e4021;
        }
    </style>
</head>

<body>
    <h2>Lista de Productos</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Zona de Origen</th>
            <th>Stock</th>
            <th>Fecha de Ingreso</th>
            <th>Acciones</th>
        </tr>

        <?php
        // Consulta para obtener los productos
        $sql = "SELECT * FROM producto";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar los datos en una tabla
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_producto'] . "</td>";
                echo "<td>" . $row['nombreProducto'] . "</td>";
                echo "<td>" . $row['Descripcion'] . "</td>";
                echo "<td>" . $row['Precio'] . "</td>";
                echo "<td>" . $row['Zona_origen'] . "</td>";
                echo "<td>" . $row['StockDisponible'] . "</td>";
                echo "<td>" . $row['fecha_ingreso'] . "</td>";
                echo "<td><a href='editarProducto2.php?id=" . $row['id_producto'] . "'>Editar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No hay productos registrados.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>

</html>
