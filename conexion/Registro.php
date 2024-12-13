<?php 
session_start(); // Iniciar la sesión
include './conexion/conexionBD.php';


$id = $_GET['id'];
// Valida que existe el name 'register' en el submit del form
if (isset($_POST["registro"])) 


{

    //captura cada campo del form
    $nombre = $_POST["nombre"];
    $PrimerApellido = $_POST["PrimerApellido"];
    $SegundoApellido = $_POST["SegundoApellido"];
    $CorreoElectronico = $_POST["CorreoEectronico"];
    $contrasena = $_POST["contrasena"];
    $Telefono = $_POST["Telefono"];
    $Direccion = $_POST["Direccion"];
      
// Insertar datos en la tabla usuario 
$sql = "INSERT INTO usuario (id_Rol, nombre, PrimerApellido, SegundoApellido, CorreoElectronico, contrasena, Telefono, Direccion) 
VALUES (1, '$nombre', '$PrimerApellido', '$SegundoApellido', '$CorreoElectronico', '$contrasena', '$Telefono', '$Direccion')";

if ($conn-> query($sql) == TRUE) {
    $_SESSION["mensaje"] = "Registro Exitoso";
    header("Location: index.html");
    }else{
        echo"Error" . $sql . "<br>" . $conn->error; 
        }
    }
    $conn ->close();
?>