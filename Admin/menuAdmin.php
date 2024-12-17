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
    <title>Gestión de Productos</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        /* Contenedor de botones */
        .button-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        /* Estilos para los botones */
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        button:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>
<h1>pagina de admin </h1>
<img src="../Img/logo.jpg" width="150" alt="">
    <h1>Elige una de estas opciones</h1>
    <div class="button-container">
        
        <button onclick=" window.location.href = 'menuProductos.php';">&bull; gestion productos</button>
        <button onclick=" window.location.href = 'pedidos.php';">&bull; Ver todos pedidos</button>
        <button onclick=" window.location.href = 'users.php';">&bull;usuarios del sistema</button>
        <p>sesion iniciada como: <?= getCorreoUser()?></p>

        <a href="../index.html">Cerrar session</a>
    </div>
</body>
</html>