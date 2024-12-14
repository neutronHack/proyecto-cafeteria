<?php
require 'conexionBD.php';
session_start();
//obtener datos del formulario
$CorreoElectronico = $_POST["email"];
$contrasena = $_POST["password"];

echo $CorreoElectronico. "<br>";
echo $contrasena. "<br>";

//Verificar si el usuario existe
$sql = "SELECT * FROM usuario WHERE CorreoElectronico='$CorreoElectronico'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);


if ($row['CorreoElectronico'] == $CorreoElectronico) {


    if ($row['contrasena'] == $contrasena) {

        echo "<script> alert('has iniciado sesion con exito')    </script>";
        if ($row['id_Rol'] == 1) {
            // Administrador

        } elseif ($row['id_Rol'] == 2) {
            // Usuario

            $ID_USUARIO = $row['id_usuario'];
            $correoUsuario = $row['CorreoElectronico'];
            
            $_SESSION['IDuser'] = $ID_USUARIO;// ----------------------------------------------- ID DE SESION DE USUARIO------------------------------
            $_SESSION['CorreoUser'] = $correoUsuario; // -------------------------------------------- CORREO DEL USUARIO EN LA SESSION ----------------------------
            echo "<script> window.location.href = `../indexUser.php`; </script>";

        }
    } else {
        echo "<script> alert(`Contraseña no valida`);    window.history.back();   </script>";
    }
} else {
    echo "<script> alert(`Correo electronico no valido`); window.history.back(); </script>";
}


mysqli_close($conn);

?>

