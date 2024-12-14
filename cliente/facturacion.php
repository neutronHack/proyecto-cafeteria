<?php 

require '../conexion/conexionBD.php'; // Incluye tu archivo de conexión a la base de datos.
include '../informacion_session.php';
session_start();

    $pago = $_POST['pago'];
    $totalPagar = $_POST['total'];
    $correoUtilizado = $_POST['correoUser'];

    //echo $pago .'<br> ';
    //echo $totalPagar .'<br> ';

    //echo $correoUtilizado .'<br> ';
    $fecha_ingreso = date('Y-m-d'); // Año-Mes-Día en formato numérico

    $sql = "INSERT INTO `factura`( `fecha_emision`, `forma_pago`, `Total`, `Correo_comprador`) VALUES ('$fecha_ingreso','$pago','$totalPagar','$correoUtilizado');";
    $ejecutar_consulta = mysqli_query($conn,$sql);

     $Id_usuario  =  $_SESSION['IDuser'];
    if ($ejecutar_consulta) {
        echo "<script> 
        
        alert('SE VA A REALIZAR LA FACTURA');
         alert('el id del usuario es {$Id_usuario}');
        
        window.location.href = '../indexUser.php';
        </script>";
    }

    // Consulta SQL
    $sql = "UPDATE `usuario` SET `metodoPago` = '$pago' WHERE `id_usuario` = $Id_usuario";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql)) {
    echo "Registro actualizado correctamente";
    } else {
    echo "Error al actualizar el registro: " . mysqli_error($conexion);
    }

// Cerrar la conexión
mysqli_close($conexion);

?>

