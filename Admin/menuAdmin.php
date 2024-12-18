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
            background-color: #ffffff;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        /* Contenedor de botones */
        .button-container {
            display: flex;
            flex-direction: column;
            gap: 25px;
            
        }

        /* Estilos para los botones */
        button {
            background-color: #977553;
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
            background-color: #583f26;
        }

        button:active {
            transform: scale(0.98);
        }


        .log-out{
            text-align: center;
        }


    </style>
</head>
<body>
<h1>ADMINISTRADOR</h1>
<img src="../Img/logo.jpg" width="150" alt="">
    <div class="button-container">
        
        <button onclick=" window.location.href = 'menuProductos.php';">GESTION PRODUCTOS</button>
        <button onclick=" window.location.href = 'pedidos.php';">VER PEDIDOS</button>
        <button onclick=" window.location.href = 'users.php';">USUARIOS DEL SISTEMA</button>
        <p>sesion iniciada como: <?= getCorreoUser()?></p>

        <a href="../index.html" class="log-out">Cerrar Session</a>
    </div>
</body>
</html>