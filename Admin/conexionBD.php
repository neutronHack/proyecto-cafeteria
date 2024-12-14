<?php
$server = "localhost";
$user = "root"; // Este es el usuario predeterminado en XAMPP //La contraseña suele estar vacía en XAMPP por defecto
$dbname = "cafeteria";   //nombre de tu base de datos

// Crear conexión
$conn = mysqli_connect($server, $user, "", $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
echo "<script>console.log(Conexión exitosa a la base de datos) ; </script>";
echo 'CONEXION EXITOSA A LA BASE DE DATOS';


?>



