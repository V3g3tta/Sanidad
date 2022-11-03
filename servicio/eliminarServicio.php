<?php

session_start();
if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';

if (!empty($_GET['codServicio']) ){

    $codServicio = protege($_GET['codServicio']);


    $querySearchDni = "SELECT * FROM servicios_camas WHERE cod_servicios   = '$codServicio'";
    $searchDni = $conexion->query($querySearchDni)->rowCount();

    if($searchDni > 0){
        $mensaje = [
            'mensaje' => 'ESTE SERVICIO NO LO PUEDES ELIMINAR SI TIENE ASIGNADO UNA CAMA',
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaServicio.php');

        exit();
    }



    $query = "DELETE FROM servicios WHERE cod_servicios = '$codServicio'";
    $eliminar = $conexion->query($query);


    if (!$eliminar){

        $mensaje = [
            'mensaje' => 'Error al eliminar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaServicio.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al eliminar Servicio',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaServicio.php');

}else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaServicio.php');
}