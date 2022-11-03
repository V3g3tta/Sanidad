<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';
require '../config/protege.php';

if (!empty($_POST['nombreservicio']) && !empty($_POST['codServicio'])
){


    $codServicio = protege($_POST['codServicio']);
    $nombreservicio = protege($_POST['nombreservicio']);


    $query = "UPDATE servicios SET servicios = '$nombreservicio' WHERE cod_servicios = '$codServicio'";
    $guardar = $conexion->query($query);
    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaServicio.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al actualizar servicio',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaServicio.php');

} else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaServicio.php');
}