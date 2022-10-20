<?php

session_start();

require '../config/db.php';

if (!empty($_GET['ccodamisiones']) ){

    $codAdmision = $_GET['codamisiones'];

    $query = "DELETE FROM admisiones WHERE cod_admisiones = '$codAdmision'";
    $eliminar = $conexion->query($query);

    if (!$eliminar){

        $mensaje = [
            'mensaje' => 'Error al eliminar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaAdmisiones.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al eliminar el registro adminsiones',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaAdmisiones.php');

}else{

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaAdmisiones.php');
}
