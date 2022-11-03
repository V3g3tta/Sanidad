<?php
session_start();

require '../config/db.php';

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

if (!empty($_GET['codCama']) ){

    $codCama = protege($_GET['codCama']);

    $query = "DELETE FROM camas WHERE cod_camas = '$codCama'";
    $eliminar = $conexion->query($query);


    if (!$eliminar){

        $mensaje = [
            'mensaje' => 'Error al eliminar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaCama.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al eliminar usuario',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaCama.php');

}else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaCama.php');
}