<?php
require '../conexion/conexionBD.php'; // Incluye tu archivo de conexión a la base de datos.
include 'informacion_session.php';
session_start();

// Consulta SQL para obtener los productos
$query = "SELECT id_producto, nombreProducto, Precio FROM producto";
$result = mysqli_query($conn, $query);

// Verifica si hay productos en la base de datos
if (!$result) {
    echo "Error al obtener los productos: " . mysqli_error($conexion);
    exit;
}


// Crear arrays de productos en JavaScript
$productNames = [];
$productPrices = [];
while ($row = mysqli_fetch_assoc($result)) {
    $productNames[] = $row['nombreProducto'];
    $productPrices[] = $row['Precio'];
}











?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulación de Compra - Tierra de Café</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../CSS/PaginaInicial.css">
    <link rel="stylesheet" href="../CSS/DropdownMenu.css">
    <style>
        #page-title {
            text-align: center;
            font-size: 48px;
            color: #ece8e5;
            margin-top: 100px;
            font-weight: bold;
        }

        .container {
            margin: 50px auto;
            padding: 20px;
            width: 80%;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #502d16;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #502d16;
            color: white;
        }

        h1 {
            color: #502d16 !important
        }

        .input-quantity {
            width: 60px;
            text-align: center;
        }

        #summary {
            margin-top: 30px;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 10px;
            font-size: 18px;
            color: #502d16;
        }

        #total {
            font-weight: bold;
            font-size: 22px;
            margin-top: 20px;
        }

        button {
            background-color: #502d16;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #704024;
        }
    </style>
</head>

<body>
    <header>

        <nav class="navbar">
            <div class="container-fluid">
                <div class="logo">
                    <a href="#"><img src="../Img/logo.jpg" alt="logo" alt="Tierra del Café"></a>
                </div>

                <div class="nav-links">
                    <li class="nav-item"><a href="javascript:void(0)">TIENDA<span class="glyphicon glyphicon-chevron-down iconsize"></span></a>
                        <ul class="dropdown">
                            <li><a href="../PHP/cafePage.php">CAFÉ</a></li>
                            <li><a href="#">ORDENAR</a></li>

                            <li><a href="../PHP/AccesoriosPage.php">ACCESORIOS</a></li>
                        </ul>
                    </li>
                    <li class="ml-5 nav-item"><a href="../NosotrosPage.html">NOSOTROS<span class="glyphicon glyphicon-chevron-down"></span></a>
                </div>
                <div class="iconos">
        
                    <a href="../perfil.php">
                        <img src="../Img/inicio-sesion.svg" class="iconos">
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <h1 id="page-title">Selecciona tus productos</h1>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php
                mysqli_data_seek($result, 0); // Reiniciar el puntero de resultados
                $index = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['nombreProducto']}</td>";
                    echo "<td>\${$row['Precio']}</td>";
                    echo "<td><input type='number' class='input-quantity' id='product{$index}' min='0' value='0'></td>";
                    echo "</tr>";
                    $index++;
                    
                }
                ?>
            </tbody>
        </table>

        <button onclick="simulatePurchase()">Procesar</button>

        <div id="summary">
            <h3>Resumen de la compra</h3>
            <p id="product-list">No has seleccionado productos.</p>
            <p id="total">Total: $0</p>

            <form id="formulario" action="../cliente/facturacion.php" method="post">
                

                    <label for="pago">Metodo de pago</label>


                    <p> MasterCard <input type="radio" name="pago" value="MasterCard" id="MasterCard" required></p>
                    <p> VISA<input type="radio" name="pago" id="VISA" value="VISA" required></p>
                    <p> PAYPAL<input type="radio" name="pago" id="PAYPAL" value="Paypal" required></p>

                    <p>Direccion: <input type="text" name="direction" id="direction" required></p>

                    <p>Correo de comprador <?= getDataUser(4) ?> </p>
                    <p>total <input type="number" name="total" id="totalInput" readonly> </p>



              




                <button hidden id="btn_compra" type="submit">Comprar</button>

            </form>
            <button type="reset" hidden id="btn_reset" onclick="Reset()">Negar transacción</button>


        </div>


        <script>
            // Recuperar arrays de PHP a JavaScript
            let productNames = <?php echo json_encode($productNames); ?>;
            let productPrices = <?php echo json_encode($productPrices); ?>;

            function simulatePurchase() {
                let productQuantities = [];
                for (let i = 1; i <= productNames.length; i++) {
                    productQuantities.push(document.getElementById(`product${i}`).value);
                }

                let productList = "";
                let total = 0;

                for (let i = 0; i < productQuantities.length; i++) {
                    if (productQuantities[i] > 0) {
                        productList += `${productQuantities[i]} x ${productNames[i]} - $${productPrices[i]} cada uno<br>`;
                        total += productQuantities[i] * productPrices[i];
                    }
                }

                document.getElementById("product-list").innerHTML = productList || "No has seleccionado productos.";
                document.getElementById("total").innerHTML = `Total: $${total}`;

                document.getElementById("total").innerText = `Total: $${total}`;

                // Inserta el valor del total en el input oculto
                document.getElementById("totalInput").value = total;

                document.getElementById("btn_compra").hidden = total === 0;
                document.getElementById("btn_reset").hidden = total === 0;
                

            }

            function Reset() {

                window.location.reload();


            }
        </script>

</body>
<a href=""></a>

</html>