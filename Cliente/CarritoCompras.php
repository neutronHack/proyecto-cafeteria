<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulación de Compra - Tierra de Café</title>
    <style>
        body {
            background-image: url('C:/clase/imagenes/427470.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            margin: 0;
        }

        header {
            background-color: #a1b792;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 24px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1;
        }

        #page-title {
            text-align: center;
            font-size: 48px;
            color: #ece8e5;
            margin-top: 100px;
            font-weight: bold;
        }

        #logo {
            display: block;
            margin: 0 auto;
            width: 350px;
            height: auto;
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

        table, th, td {
            border: 1px solid #502d16;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #b3b792;
            color: white;
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
        Tierra de Café - Simulación de Compra
    </header>

    <h1 id="page-title">Selecciona tus productos</h1>

    <img id="logo" src="C:/clase/imagenes/WhatsApp Image 2024-10-18 at 11.15.34_b222fb75.png" alt="Logo de Tierra de Café">

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
                <tr>
                    <td>Cafe Amargo</td>
                    <td>$5</td>
                    <td><input type="number" class="input-quantity" id="product1" min="0" value="0"></td>
                </tr>
                <tr>
                    <td>Cafe Natural</td>
                    <td>$6</td>
                    <td><input type="number" class="input-quantity" id="product2" min="0" value="0"></td>
                </tr>
                <tr>
                    <td>Cafe de Caramelo</td>
                    <td>$7</td>
                    <td><input type="number" class="input-quantity" id="product3" min="0" value="0"></td>
                </tr>
                <tr>
                    <td>Cafe De Chocolate</td>
                    <td>$8</td>
                    <td><input type="number" class="input-quantity" id="product4" min="0" value="0"></td>
                </tr>
                <tr>
                    <td>Cafe Negro</td>
                    <td>$5</td>
                    <td><input type="number" class="input-quantity" id="product5" min="0" value="0"></td>
                </tr>
                <tr>
                    <td>Cafe Colombiano</td>
                    <td>$9</td>
                    <td><input type="number" class="input-quantity" id="product6" min="0" value="0"></td>
                </tr>
                <tr>
                    <td>Cafe Expreso</td>
                    <td>$10</td>
                    <td><input type="number" class="input-quantity" id="product7" min="0" value="0"></td>
                </tr>
            </tbody>
        </table>

        <button onclick="simulatePurchase()">Simular Compra</button>

        <div id="summary">
            <h3>Resumen de la compra</h3>
            <p id="product-list">No has seleccionado productos.</p>
            <p id="total">Total: $0</p>
        </div>
    </div>

    <script>
        function simulatePurchase() {
            let productNames = ["Cafe Amargo", "Cafe Natural", "Cafe de Caramelo", "Cafe De Chocolate", "Cafe Negro", "Cafe Colombiano", "Cafe Expreso"];
            let productPrices = [5, 6, 7, 8, 5, 9, 10];
            let productQuantities = [
                document.getElementById("product1").value,
                document.getElementById("product2").value,
                document.getElementById("product3").value,
                document.getElementById("product4").value,
                document.getElementById("product5").value,
                document.getElementById("product6").value,
                document.getElementById("product7").value
            ];

            let productList = "";
            let total = 0;

            for (let i = 0; i < productQuantities.length; i++) {
                if (productQuantities[i] > 0) {
                    productList += `${productQuantities[i]} x ${productNames[i]} - $${productPrices[i]} cada uno<br>`;
                    total += productQuantities[i] * productPrices[i];
                }
            }

            if (productList === "") {
                document.getElementById("product-list").innerHTML = "No has seleccionado productos.";
            } else {
                document.getElementById("product-list").innerHTML = productList;
            }

            document.getElementById("total").innerHTML = `Total: $${total}`;
        }
    </script>

</body>
</html>
