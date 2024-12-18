<?php 

require '../conexion/conexionBD.php';
include 'informacion_session.php';
session_start();

    $pago = $_POST['pago'];
    $totalPagar = $_POST['total'];
    $correoUtilizado = getDataUser(4);
    $direccion_pedido = $_POST['direction'];

    //echo $pago .'<br> ';
    //echo $totalPagar .'<br> ';

    //echo $correoUtilizado .'<br> ';
    $fecha_ingreso = date('Y-m-d'); // Año-Mes-Día en formato numérico

    $sql = "INSERT INTO `factura`( `fecha_emision`, `forma_pago`, `Total`, `Correo_comprador`, `Direccion`) VALUES ('$fecha_ingreso','$pago','$totalPagar','$correoUtilizado', '$direccion_pedido');";
    $ejecutar_consulta = mysqli_query($conn,$sql);

     $Id_usuario  =  $_SESSION['IDuser'];


     // Consulta SQL
    $sql = "UPDATE `usuario` SET `metodoPago` = '$pago' WHERE `id_usuario` = $Id_usuario";

    // Ejecutar la consulta
    if (mysqli_query($conn, $sql)) {
    echo "Registro actualizado correctamente";
    } else {
    echo "Error al actualizar el registro: " . mysqli_error($conexion);
    }
    if ($ejecutar_consulta) {
        echo "<script> 
        
        alert('SE VA A REALIZAR LA FACTURA');
         alert('el id del usuario es {$Id_usuario}');
        
        window.location.href = '../indexUser.php';
        </script>";
    }

    

// Cerrar la conexión
mysqli_close($conn);

?>

