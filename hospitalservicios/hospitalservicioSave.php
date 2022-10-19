<?php

session_start();

require '../config/db.php';

if (!empty($_POST['hospitalRegistrado']) && !empty(['servicioRegistrado']))

{
    $hospitalRegistrado = $_POST['hospitalRegistrado'];
    $servicioRegistrada = $_POST['servicioRegistrado'];


    $querySearchHospitalServicios = "SELECT * FROM hospitales_servisios WHERE cod_servicios  = '$servicioRegistrada' AND cod_hospitales = '$hospitalRegistrado'";
    $searchHospitalServicio= $conexion->query($querySearchHospitalServicios)->rowCount();

    if($searchHospitalServicio > 0 ){
        $mensaje = [
            'mensaje' => 'EL HOSPITAL YA TIENE ESTE SERVICIO REGISTRADO ',
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: hospitalservicio.php');

        exit();
    }

    $query = "INSERT INTO hospitales_servisios VALUES (NULL,'$hospitalRegistrado',' $servicioRegistrada')";
    $guardar = $conexion->query($query);

    if($query > 0){
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