<?php 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "cafeteria";

//crear conex
if ($conn-> connect_error){
    die("Conexion Fallida". $conn->connect_error);
}

//obtener datos del formulario
$CorreoElectronico = $_POST["Correo Electronico"];
$contrasena = $_POST["contrasena"];

//Verificar si el usuario existe
$sql = "SELECT * FROM usuario WHERE CorreoElectronico='$CorreoElectronico'"; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) { 
    $row = $result->fetch_assoc();
     if (password_verify($contrasena, $row['contrasena'])) { 
        echo "Inicio de sesión exitoso"; // Aquí puedes iniciar sesión y redirigir al usuario 
    } else { 
        echo "Contraseña incorrecta"; 
    } 
} else { 
    echo "No se encontró el usuario"; 
            } 
$conn->close();
?>