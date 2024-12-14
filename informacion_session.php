<?php

$id_User   = $_SESSION['IDuser'];
$Correo_User   = $_SESSION['CorreoUser'];
//RETORNA EL ID DEL USUARIO
function getIDuser()
{
    $id_User   = $_SESSION['IDuser'];
    return $id_User;
}

//RETORNA EL CORREO DEL USUARIO
function getCorreoUser()
{
    $Correo_User   = $_SESSION['CorreoUser'];
    return $Correo_User;
}

function getDataUser($num1_10)
{
    require '../proyecto-cafeteria/conexion/conexionBD.php';
    $id_User   = $_SESSION['IDuser'];

    $sql = "SELECT * FROM `usuario` WHERE `id_usuario` = $id_User;";
    $ejecutar_query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($ejecutar_query, MYSQLI_ASSOC);


    switch ($num1_10) {
        case 1:
            # code...

            
            break;
        

        case 2:
            
            break;
        default:
            # code...
            break;
    }
}
