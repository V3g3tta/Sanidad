<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';

if (!empty($_POST['camaRegistrada']) && !empty(['servicioRegistrado']))

{
    $camaRegistrada = protege($_POST['camaRegistrada']);
    $servicioRegistrada = protege($_POST['servicioRegistrado']);

    $querySearchCama = "SELECT * FROM servicios_camas WHERE cod_camas = '$camaRegistrada'";
    $searchCama = $conexion->query($querySearchCama)->rowCount();

    if($searchCama > 0){
        $mensaje = [
            'mensaje' => 'Esta cama ya tiene asiganado un servicio',
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: serviciocama.php');

        exit();
    }

    $query = "INSERT INTO servicios_camas VALUES (NULL,'$camaRegistrada',' $servicioRegistrada')";
    $guardar = $conexion->query($query);


    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: serviciocama.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al guardar Servicio Cama',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: serviciocama.php');

} else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: serviciocama.php');
}



