<?php
$servername = "localhost";
$username = "root"; // Este es el usuario predeterminado en XAMPP
$password = "";   //La contraseña suele estar vacía en XAMPP por defecto
$dbname = "cafeteria";   //nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
echo "Conexión exitosa a la base de datos";
?>



