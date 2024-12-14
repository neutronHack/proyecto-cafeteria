<?php
require '../proyecto-cafeteria/conexion/conexionBD.php';
include 'informacion_session.php';
session_start();



?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Su perfil de tierra del café</title>

    <link rel="stylesheet" href="CSS/perfil.css ">
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
        <h1>Su perfil de tierra del café   </h1>
        <div class="button-container">
            <a href="perfil.php">
                <button>Información de perfil</button>
            </a>
            <a href="direcciones.php">
                <button>Ver Direcciones</button>
            </a>
            <a href="pedidos.php">
                <button>Pedidos</button>
            </a>
            <button onclick="window.location.href = 'index.html';" class="logout">Cerrar Sesión</button>
        </div>
        <div class="profile-info">
            <h2>Información de perfil</h2>
            <div class="info-box" style="margin: 12px;">
                <p>Nombre:</p>
                <p>Correo: <?= getCorreoUser(); ?> </p>

                
            </div>
        </div>
    </main>
</body>

</html>