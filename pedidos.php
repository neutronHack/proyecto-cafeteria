<?php
require '../proyecto-cafeteria/conexion/conexionBD.php'; // Incluye tu archivo de conexión a la base de datos.
include 'informacion_session.php';
session_start();






?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tierra del Café - Pedidos</title>
    <link rel="stylesheet" href="CSS/pedidos.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="../proyecto-cafeteria/Img/logo.jpg" alt="logo" alt="Tierra del Café">



            </div>

        </nav>
    </header>
    <main>
        <h1>Su perfil de Tierra del Café</h1>
        <div class="button-container">
            <a href="perfil.php" class="button">
                <button>Información de perfil</button>
            </a>
            <a href="direcciones.php" class="button">
                <button>Ver Direcciones</button>
            </a>
            <button class="active">Pedidos</button>

            <button onclick="window.location.href = 'index.html';" class="logout">Cerrar Sesión</button>

        </div>
        <section class="pedidos">
            <h2>Historial de pedidos</h2>
            <?php
            
            $correoUser = getDataUser(4);
            $query_pedidos = "SELECT * FROM factura WHERE Correo_comprador = '{$correoUser}' ; ";
            $ejecutar_query = mysqli_query($conn, $query_pedidos);

            //MIENTRAS ENCUENTRE COINCIDENCIA CON ALGUNA FILA DEL USUARIO TRAE LOS DATOS INDEPENDIENTES DE CADA PEDIDO
            while ($mostrar_datosFactura = mysqli_fetch_array($ejecutar_query)) {
                $totalPagar = $mostrar_datosFactura['Total'];
                $id_pedido = $mostrar_datosFactura['id_factura'];
                $fecha_emision = $mostrar_datosFactura['fecha_emision'];
                $formaPago = $mostrar_datosFactura['forma_pago'];
                $direccion = $mostrar_datosFactura['Direccion'];

               echo" <div class='pedido'> ";
               echo 'ID de la factura: '. $id_pedido .'<br>';
               echo 'Fecha de emision de la factura: '. $fecha_emision .'<br>';

              echo'Correo del usuario: '. getDataUser(4);
              echo '  <p>Total </p>';
              echo '<p>'. $totalPagar. '</p>';
              echo 'forma de pago utilizada: ' . $formaPago . '<br>';
              echo '<p> Direccion de entrega: '. $direccion. '</p>';
            ?>


                
                    
                   

                </div>

            <?php

            }

            ?>

        </section>

        <div>
            <button onclick="window.location.href = 'indexUser.php';" class="regresarBtn">Regresar</button>
        </div>
    </main>

</body>

</html>