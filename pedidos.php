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
                <img src="../proyecto-cafeteria/Img/logo.jpg" alt="logo"  alt="Tierra del Café"> 


                
            </div>
            
        </nav>
    </header>
    <main>
        <h1>Su perfil de Tierra del Café</h1>
        <div class="button-container">
            <a href="perfil.php" class="button">
                <button>Información de perfil</button>
            </a>
            <button class="active">Pedidos</button>
            
                <button onclick="window.location.href = 'index.html';" class="logout">Cerrar Sesión</button>
            
        </div>
        <section class="pedidos">
            <h2>Historial de pedidos</h2>
            <!-- Örnek bir sipariş satırı -->
            <div class="pedido">
                <p>Pedido </p>
                
            </div>
            <div class="pedido">
                <p>Pedido </p>
                
            </div>
            <!-- Diğer siparişler buraya eklenebilir -->
        </section>

        <div>
            <button onclick="window.location.href = 'indexUser.php';" class="regresarBtn">Regresar</button>
        </div>
    </main>
   
</body>
</html>
