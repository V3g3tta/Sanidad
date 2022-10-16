<?php

session_start();

require '../config/db.php';

if (!empty($_GET['codHospital']) ){

    $codHospital = $_GET['codHospital'];

    $query = "DELETE FROM hospitales WHERE cod_hospitales= '$codHospital'";
    $eliminar = $conexion->query($query);


    if (!$eliminar){

        $mensaje = [
            'mensaje' => 'Error al eliminar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaHospital.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al eliminar hospital',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaHospital.php');

}else{

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaHospital.php');
}