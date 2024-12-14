<?php

include './conexion/conexionBD.php';
$id = $_GET['id'];
// Valida que existe el name 'register' en el submit del form
if (isset($_POST["register"])) {

    // Captura cada campo del form
    $username = mysqli_real_escape_string($conexion, $_POST["username"]);
    $email = mysqli_real_escape_string($conexion, $_POST["email"]);
    $fechaNacimiento = mysqli_real_escape_string($conexion, $_POST["fechaNacimiento"]);
    $identificacion = mysqli_real_escape_string($conexion, $_POST["identificacion"]);
    $rol = mysqli_real_escape_string($conexion, $_POST["rol"]);

    $validRoles = ['1', '2', '3', '4'];
    if (!in_array($rol, $validRoles)) {
        die("Error: Rol inválido seleccionado.");
    }

    // Construcción de la consulta
     $query = "INSERT INTO usuario (`Nombre`, `Correo`, `Fecha_Nacimiento`, `Identificacion`, `Id_Rol`, `Contraseña`)
    VALUES ('$username' , '$email' , '$fechaNacimiento' , '$identificacion', '$rol', 'Ulacit1234')";


    //selecciona la base de datos y el siguiente parametro hace la consulta
    $ejecutar = mysqli_query($conexion, $query);
    
    if ($ejecutar) {
        echo '<script>
        alert("Usuario almacenado exitosamente");
        window.location.href = "dashboard.php?USUARIO=' . urlencode($id) . '";
      </script>';

    } else {
        echo "Error al almacenar los datos: " . mysqli_error($conexion);
    }
    // Validación adicional para asegurar que el rol es válido




    mysqli_close($conexion);
}

?>