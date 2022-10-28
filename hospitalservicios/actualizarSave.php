<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';


if (!empty($_POST['hospitalRegistrado']) && !empty(['servicioRegistrado'])
    && !empty($_POST['codServicioHospital']))


{



    $codServicioHospital = $_POST['codServicioHospital'];
    $hospitalRegistrado = $_POST['hospitalRegistrado'];
    $servicioRegistrada = $_POST['servicioRegistrado'];



    $query = "UPDATE hospitales_servisios SET cod_hospitales = '$hospitalRegistrado', cod_servicios  = '$servicioRegistrada'   WHERE cod_hospitales_servisios = '$codServicioHospital'";
    $guardar = $conexion->query($query);


    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaHospitalServicios.php');


        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al actualizar servicio cama',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaHospitalServicios.php');
}else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaHospitalServicios.php');

}