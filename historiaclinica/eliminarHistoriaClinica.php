<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';

if (!empty($_GET['codHistoriaClinica'])){

    $codHistoriaClinica= protege($_GET['codHistoriaClinica']);

    $query = "DELETE FROM historia_clinica WHERE cod_historia_clinica = '$codHistoriaClinica'";
    $eliminar = $conexion->query($query);


    if (!$eliminar){

        $mensaje = [
            'mensaje' => 'Error al eliminar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaHisotiaClinica.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al eliminar Historia Clinica',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaHisotiaClinica.php');

}else{

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaHisotiaClinica.php');
}
