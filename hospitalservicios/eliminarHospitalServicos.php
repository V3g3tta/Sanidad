<?php

session_start();

require '../config/db.php';

if (!empty($_GET['codServicioHospital']) ){

    $codServicioHospital = $_GET['codServicioHospital'];

    $query = "DELETE FROM hospitales_servisios WHERE  cod_hospitales_servisios= '$codServicioHospital'";
    $eliminar = $conexion->query($query);


    if (!$eliminar){

        $mensaje = ['mensaje' => 'Error al eliminar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaHospitalServicios.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al eliminar servicio cama',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaHospitalServicios.php');

}else{

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaHospitalServicios.php');
}