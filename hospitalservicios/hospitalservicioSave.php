<?php

session_start();

require '../config/db.php';

if (!empty($_POST['hospitalRegistrado']) && !empty(['servicioRegistrado']))

{
    $hospitalRegistrado = $_POST['hospitalRegistrado'];
    $servicioRegistrada = $_POST['servicioRegistrado'];


    $querySearchHospital = "SELECT * FROM hospitales WHERE nombre = '$hospitalRegistrado'";
    $searchHospital= $conexion->query($querySearchHospital)->rowCount();

    if($searchHospital > 0){
        $mensaje = [
            'mensaje' => 'EL HOSPITAL YA SE ENCUETRA REGISTRADO',
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: hospital.php');

        exit();
    }

    $querySearchservicio = "SELECT * FROM servicios WHERE servicios ='$servicioRegistrada'";
    $searchservicio = $conexion->query($querySearchservicio)->rowCount();

    if($searchservicio > 0){
        $mensaje = [
            'mensaje' => 'Esta el servicio ya existe',
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: hospitalservicio.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al guardar usuario',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: hospitalservicio.php');

} else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: hospitalservicio.php');
}