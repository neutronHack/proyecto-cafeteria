<?php


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

    $nombre = $row['nombre'];
    $apellido1 = $row['PrimerApellido'];
    $apellido2 = $row['SegundoApellido'];
    $correo = $row['CorreoElectronico'];
    $contrasena = $row['contrasena'];
    $telefono = $row['Telefono'];
    $adress = $row['Direccion'];
    $metodo_pago = $row['metodoPago'];

    switch ($num1_10) {
        case 1:
            # code...
            return $nombre;

            break;


        case 2:
            return $apellido1;

            break;


        case 3:
            return $apellido2;
            break;

        case 4:
            return $correo;
            break;

        case 5:
            return $contrasena;
            break;

        case 6:
            return $telefono;
            break;

        case 7:
            return $adress;
            break;

        case 8:
            return $metodo_pago;
            break;
    }
}
