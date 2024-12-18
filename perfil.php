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
    <title>INFORMACION DEL PERFIL</title>

    <link rel="stylesheet" href="CSS/perfil.css ">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="./Img/logo.jpg" alt="logo" alt="Tierra del Café">



            </div>

        </nav>
    </header>
    <main>
        <h1>PERFIL</h1>
        <div class="button-container">
            <a href="perfil.php">
                <button>Información de perfil</button>
            </a>
            <a href="pedidos.php">
                <button>Pedidos</button>
            </a>
            <button onclick="window.location.href = 'index.html';" class="logout">Cerrar Sesión</button>
        </div>
        <div class="profile-info">
            <h2>Información de perfil</h2>
            <div class="info-box" style="margin: 12px;">
                <p>Nombre: <?= getDataUser(1); ?></p>
                <p>Correo: <?= getCorreoUser(); ?> </p>
                <p>Telefono: <?= getDataUser(6); ?> </p>
                <p>direccion: <?= getDataUser(7); ?> </p>
                <p>metodo de pago preferido : <?= getDataUser(8); ?> </p>
            </div>
        </div>

        <div>
            <button onclick="window.location.href = 'indexUser.php';" class="regresarBtn">Regresar</button>
        </div>
    </main>
</body>

</html>