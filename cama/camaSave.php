<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';
require '../config/protege.php';

if (!empty($_POST['nombreCama'])){

    $nombreCama = protege($_POST['nombreCama']);

    $querySearchCama = "SELECT * FROM camas WHERE nombre_camas = '$nombreCama'";
    $searchCama = $conexion->query($querySearchCama)->rowCount();

    if($searchCama > 0){
        $mensaje = [
            'mensaje' => 'Esta cama ya existe',
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: cama.php');

        exit();
    }


    $query = "INSERT INTO camas VALUES (NULL, '$nombreCama')";
    $guardar = $conexion->query($query);

    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar cama ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: cama.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al guardar cama',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: cama.php');

} else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: cama.php');
}

