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
<a href="menuAdmin.php">Volver</a>
    <h2>Lista de Usuarios</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>rol</th>
            <th>telefono</th>
            <th>Direccion</th>
            <th>Metodo de pago</th>
            
        </tr>

        <?php
        // Consulta para obtener los productos
        $sql = "SELECT * FROM usuario";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar los datos en una tabla
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_usuario'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['CorreoElectronico'] . "</td>";

                if($row['id_Rol'] == 1){
                    echo "<td>" . 'Administrador' . "</td>";

                }else{
                    echo "<td>" . 'Cliente' . "</td>";
                }
               



                echo "<td>" . $row['Telefono'] . "</td>";
                echo "<td>" . $row['Direccion'] . "</td>";
                echo "<td>" . $row['metodoPago'] . "</td>";
                
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
