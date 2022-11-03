<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';
require '../config/protege.php';


if (!empty($_POST['camaRegistrada']) && !empty(['servicioRegistrado'])
    && !empty($_POST['codServicioCama']))

{

    $codServicioCama = protege($_POST['codServicioCama']);
    $camaRegistrada = protege($_POST['camaRegistrada']);
    $servicioRegistrada = protege($_POST['servicioRegistrado']);


    $query = "UPDATE servicios_camas SET cod_camas = '$camaRegistrada', cod_servicios  = '$servicioRegistrada'   WHERE cod_servicios_camas = '$codServicioCama'";
    $guardar = $conexion->query($query);


    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaServicioCama.php');


        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al actualizar servicio cama',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaServicioCama.php');
}else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaServicioCama.php');

}
