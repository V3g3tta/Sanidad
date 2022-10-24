<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';

if (!empty($_GET['codAdmision']) ) {

    $codAdmision = $_GET['codAdmision'];

    $querySearchDni = "SELECT * FROM historia_clinica WHERE cod_admision = '$codAdmision'";
    $searchDni = $conexion->query($querySearchDni)->rowCount();

    if($searchDni > 0){
        $mensaje = [
            'mensaje' => ' ESTA ADMISION NO LO PUEDES ELIMINAR SI TIENE ASIGNADO UNA HISTORIA CLINICA',
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaAdmisiones.php');

        exit();
    }


    $query = "DELETE FROM admisiones WHERE cod_admision  = '$codAdmision'";
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
        'mensaje' => 'Exito al eliminar admision',
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