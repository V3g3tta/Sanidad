<?php

session_start();

require 'config/db.php';
if (!empty($_POST['nombreservicio'])){

    $nombreservicio = $_POST['nombreservicio'];

    $querySearchservicio = "SELECT * FROM servicios WHERE servicios ='$nombreservicio'";
    $searchservicio = $conexion->query($querySearchservicio)->rowCount();     
    
    if($searchservicio > 0){
        $mensaje = [
            'mensaje' => 'Esta el servicio ya existe',
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: servicio.php');

        exit();
    }

    $query = "INSERT INTO servicios VALUES (NULL,'$nombreservicio')";
    $guardar = $conexion->query($query);

    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar cama ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: servicio.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al guardar cama',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: servicio.php');

} else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: servicio.php');
}

     