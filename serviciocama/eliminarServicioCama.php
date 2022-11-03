<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';

if (!empty($_GET['codServicioCama']) ){

    $codServicioCama = protege($_GET['codServicioCama']);


    $query = "DELETE FROM servicios_camas WHERE cod_servicios_camas = '$codServicioCama'";
    $eliminar = $conexion->query($query);


    if (!$eliminar){

        $mensaje = [
            'mensaje' => 'Error al eliminar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaServicioCama.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al eliminar servicio cama',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaServicioCama.php');

}else{

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaServicioCama.php');
}