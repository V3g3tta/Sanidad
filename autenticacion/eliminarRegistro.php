<?php
session_start();

require '../config/db.php';
require '../config/protege.php';

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

if (!empty($_GET['codUsuario']) ){

    $codUsuario = protege($_GET['codUsuario']);

    $query = "DELETE FROM usuario WHERE cod_usuario = '$codUsuario'";
    $eliminar = $conexion->query($query);


    if (!$eliminar){

        $mensaje = [
            'mensaje' => 'Error al eliminar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaRegistro.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al eliminar usuario',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaRegistro.php');

}else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaRegistro.php');
}
