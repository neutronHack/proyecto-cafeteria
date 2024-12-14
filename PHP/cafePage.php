<?php
require '../conexion/conexionBD.php'; // Incluye tu archivo de conexión a la base de datos.
include '../informacion_session.php';
session_start();

// Consulta SQL para obtener los productos
$query = "SELECT id_producto, nombreProducto, Descripcion, Precio, Zona_origen, StockDisponible FROM producto";
$result = mysqli_query($conn, $query);

// Verifica si hay productos en la base de datos
if (!$result) {
    echo "Error al obtener los productos: " . mysqli_error($conexion);
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulación de Compra - Tierra de Café</title>
    
    <link rel="stylesheet" href="../CSS/PaginaInicial.css">
    <link rel="stylesheet" href="../CSS/DropdownMenu.css">
    <link rel="stylesheet" href="../CSS/listadoProductosCafe.css">
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        h3 {
            text-align: center;
            font-size: 2rem;
            color: #5c4033;
            margin: 20px 0;
        }

        /* Contenedor principal */
        .seccion-productos {
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            justify-items: center;
        }

        /* Producto individual */
        .producto-individual {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            width: 100%;
            max-width: 300px;
        }

        .producto-individual:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Parte superior (íconos) */
        .parte-1 {
            position: relative;
            background-color: #8b5a2b; /* Color marrón */
            padding: 10px;
        }

        .parte-1 ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .parte-1 li {
            display: inline;
        }

        .parte-1 a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2rem;
            transition: color 0.3s;
        }

        .parte-1 a:hover {
            color: #f2e8cf; /* Color beige claro */
        }

        /* Parte inferior */
        .parte-2 {
            padding: 15px;
        }

        .titulo-producto {
            margin: 10px 0;
            font-size: 1.2rem;
            color: #333;
        }

        .precio-viejo-producto {
            text-decoration: line-through;
            color: #888;
            font-size: 1rem;
            margin: 5px 0;
        }

        .product-price {
            color: #5c4033; /* Color marrón oscuro */
            font-weight: bold;
            font-size: 1.3rem;
            margin: 5px 0;
        }
    </style>

</head>

<body>
<header>
        <nav class="navbar">
            <div class="logo">
                <img src="../Img/logo.jpg" alt="logo"  alt="Tierra del Café"> 
            </div>
            <div class="nav-links"> 
                <li><a href="#">TIENDA<span class="glyphicon glyphicon-chevron-down iconsize"></span></a>
                    <ul class="dropdown">
                        <li><a href="cafePage.php" >CAFÉ</a></li>
                        <li><a href="AccesoriosPage.php">ACCESORIOS</a></li>
                    </div>
                <li><a href="../NosotrosPage.html" class="us">NOSOTROS</a></li>
            </ul>
            
                <div class="iconos">
                    <a href="#carrito">
                        <img src="../Img/carrito.svg" class="iconos">
                    </a>
                    
                    <a href="../perfil.php">
                        <img src="../Img/inicio-sesion.svg" class="iconos">
                    </a>
            
        </nav>
    </header>
    <h3>CAFÉ</h3>
    <section class="seccion-productos">
        
        <?php
        // Itera sobre los productos y genera el HTML para cada uno
        while ($producto = mysqli_fetch_assoc($result)) {
            // Extrae la información del producto
            $id = $producto['id_producto'];
            $nombre = $producto['nombreProducto'];
            $precio = number_format($producto['Precio'], 2);
            $descripcion = $producto['Descripcion'];
            $stock = $producto['StockDisponible'];
            
            // Genera el HTML para el producto
            echo "
            <div id='producto-$id' class='producto-individual'>
                <div class='parte-1'>
                    <ul>
                        
                    </ul>
                </div>
                <div class='parte-2'>
                    <h3 class='titulo-producto'>$nombre</h3>
                    <h4 class='product-price'>$$precio</h4>
                </div>
            </div>";
        }
        ?>

            <!-- Producto individual 1 -->
            <div id="producto-1" class="producto-individual">
            <div class="parte-1">
                <ul>
                    <img width="250" src="../Img/Cafes/cafe 1820.png" alt="">
                </ul>
            </div>
            <div class="parte-2">
                <h3 class="titulo-producto">Café 1820 clasico</h3>
                <h4 class="precio-viejo-producto">$79.99</h4>
                <h4 class="product-price">$39.99</h4>
            </div>
        </div>

        <!-- Producto individual 2 -->
        <div id="producto-2" class="producto-individual">
            <div class="parte-1">
                <ul>
                    <img width="250" src="../Img/Cafes/cafe leyenda.webp" alt="">
                </ul>
            </div>
            <div class="parte-2">
                <h3 class="titulo-producto">Café leyenda 250g</h3>
                <h4 class="product-price">$19.99</h4>
            </div>
        </div>

        <!-- Producto individual 3 -->
        <div id="producto-3" class="producto-individual">
            <div class="parte-1">
                <ul>
                    <img width="250" src="../Img/Cafes/CafeDonLucas450.png" alt="">
                </ul>
            </div>
            <div class="parte-2">
                <h3 class="titulo-producto">Café Don Lucas 450g</h3>
                <h4 class="precio-viejo-producto">$49.99</h4>
                <h4 class="product-price">$9.99</h4>
            </div>
        </div>

        <!-- Producto individual 4 -->
        <div id="producto-4" class="producto-individual">
            <div class="parte-1">
                <ul>
                   <img width="125" src="../Img/Cafes/CafeHaug350g.png" alt="">
                </ul>
            </div>
            <div class="parte-2">
                <h3 class="titulo-producto">Café Haug 350g</h3>
                <h4 class="product-price">$29.99</h4>
            </div>
        </div>


          <!-- Producto individual 5 -->
          <div id="producto-4" class="producto-individual">
            <div class="parte-1">
                <ul>
                   <img  width="250" src="../Img/Cafes/CafeQuetzal500g.png" alt="">
                </ul>
            </div>
            <div class="parte-2">
                <h3 class="titulo-producto">Café Quetzal 500g</h3>
                <h4 class="product-price">$29.99</h4>
            </div>
        </div>

         <!-- Producto individual 6 -->
         <div id="producto-4" class="producto-individual">
            <div class="parte-1">
                <ul>
                   <img  width="300" src="../Img/Cafes/cafe_reserva-removebg-preview.png" alt="">
                </ul>
            </div>
            <div class="parte-2">
                <h3 class="titulo-producto">Café reserva 500g</h3>
                <h4 class="product-price">$29.99</h4>
            </div>
        </div>

        
    </section>
</body>

</html>

<?php
// Cierra la conexión a la base de datos
mysqli_close($conn);
?>
