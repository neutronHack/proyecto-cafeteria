<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tierra del Café - Perfil</title>
    <link rel="stylesheet" href="CSS/direcciones.css">
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
        <h1>Su perfil de tierra del café</h1>
        <div class="button-container">
            <a href="perfil.php">
                <button>Información de perfil</button>
            </a>
            <button class="active">Ver Direcciones</button>
            <a href="pedidos.php">
            <button>Pedidos</button>
        </a>
        <button onclick="window.location.href = 'index.html';" class="logout">Cerrar Sesión</button>
        </div>
        <section class="direcciones">
            <h2>Direcciones</h2>
            <button class="add-direccion">+ Añadir Dirección</button>
        </section>
    </main>
</body>
</html>
