<?php

session_start();
if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';


if (!empty($_POST['nombreCama']) && !empty($_POST['codCama'])
){


    $codCama = $_POST['codCama'];
    $nombreCama = $_POST['nombreCama'];;


    $query = "UPDATE camas SET nombre_camas = '$nombreCama' WHERE cod_camas = '$codCama'";
    $guardar = $conexion->query($query);
    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaCama.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al actualizar cama',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaCama.php');

} else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaCama.php');
}