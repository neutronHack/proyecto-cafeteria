<?php 
include 'conexionBD.php';
include 'informacion_session.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de pedidos</title>
    <style>
        /* Estilo general */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2e6d9; /* Fondo beige claro */
            color: #4d2e1a; /* Color marrón oscuro */
            margin: 0;
            padding: 0;
        }

        a {
            display: inline-block;
            margin: 20px;
            color: #8b4513; /* Marrón tierra */
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #5e3310; /* Tonalidad más oscura al pasar el mouse */
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            color: #5e3310;
        }

        /* Estilo de la tabla */
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff8f0; /* Fondo crema */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #d9b99b; /* Línea divisoria en marrón claro */
        }

        th {
            background-color: #8b4513; /* Fondo marrón oscuro */
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2e6d9; /* Color intercalado */
        }

        tr:hover {
            background-color: #e6d0b8; /* Cambio de color al pasar el mouse */
        }
    </style>
</head>
<body>
    <a href="menuAdmin.php">Volver</a>
    <h2>Lista de pedidos</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Fecha de pedido</th>
            <th>Forma de pago</th>
            <th>Total pagado</th>
            <th>Correo de cliente</th>
        </tr>

        <?php
        // Consulta para obtener los productos
        $sql = "SELECT * FROM factura";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar los datos en una tabla
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_factura'] . "</td>";
                echo "<td>" . $row['fecha_emision'] . "</td>";
                echo "<td>" . $row['forma_pago'] . "</td>";
                echo "<td>" . $row['Total'] . "</td>";
                echo "<td>" . $row['Correo_comprador'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay pedidos registrados.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
