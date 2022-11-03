<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';
require '../config/protege.php';

if (!empty($_GET['codUsuario']) ){

    $codUsuario = protege($_GET['codUsuario']);

    $querySearchDni = "SELECT * FROM admisiones WHERE cod_paciente  = '$codUsuario'";
    $searchDni = $conexion->query($querySearchDni)->rowCount();

    if($searchDni > 0){
        $mensaje = [
            'mensaje' => 'EL PACIENTE NO SE PUEDE ELIMINAR POR QUE TIENE UN REGISTRO EN ADMISIONES',
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listausuario.php');

        exit();
    }


    $query = "DELETE FROM paciente WHERE cod_paciente = '$codUsuario'";
    $eliminar = $conexion->query($query);



    if (!$eliminar){

        $mensaje = [
            'mensaje' => 'Error al eliminar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaUsuario.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al eliminar usuario',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaUsuario.php');

}else{

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaUsuario.php');
}