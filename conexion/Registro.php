<?php
require 'conexionBD.php';



// Capturar y limpiar los datos del formulario
$nombre =  $_POST['nombre'];
$primerApellido = $_POST['PrimerApellido'];
$segundoApellido =  $_POST['SegundoApellido'];
$correoElectronico =  $_POST['CorreoElectronico'];
$contrasena =  $_POST['contraseña'];
$telefono =  $_POST['Telefono'];
$direccion =  $_POST['Direccion'];
$rol = 2; // Rol predeterminado: Cliente



echo $nombre . '<br>';
echo $primerApellido . '<br>';
echo $segundoApellido . '<br>';
echo $correoElectronico . '<br>';
echo $contrasena . '<br>';
echo $telefono . '<br>';
echo $direccion . '<br>';
echo $rol . '<br>';

// Verificar si el correo ya existe en la base de datos
$sql_verificar = "SELECT CorreoElectronico FROM usuario WHERE CorreoElectronico = '$correoElectronico'";
$resultado = mysqli_query($conn, $sql_verificar);
if (mysqli_num_rows($resultado) > 0) {
    // El correo ya existe
    echo "<script>
            alert('Error: El correo electrónico ya está registrado.');
            window.history.back(); // Vuelve a la página anterior
          </script>";
} else {
    // SQL para insertar los datos
    $sql = "INSERT INTO usuario (id_Rol, nombre, PrimerApellido, SegundoApellido, CorreoElectronico, contrasena, Telefono, Direccion) 
VALUES ('$rol', '$nombre', '$primerApellido', '$segundoApellido', '$correoElectronico', '$contrasena', '$telefono', '$direccion')";

    // Ejecutar la consulta
    $ejecucion = mysqli_query($conn, $sql);
    if ($ejecucion) {
        echo "<script> window.location.href = '../index.html'    </script>";
    } else {

        echo 'NO FUNCIONO';
    }
}






// Cerrar la conexión
$conn->close();
