<?php

session_start();

require '../config/db.php';


if (!empty($_POST['medicoRegistrado']) && !empty(['hospitalservicioRegistrado'])
    && !empty($_POST['codmedicohospitalservicio']))


{



    $codServicioHospital = $_POST['codmedicohospitalservicio'];
    $hospitalRegistrado = $_POST['medicoRegistrado'];
    $servicioRegistrada = $_POST['hospitalservicioRegistrado'];


    $query = "UPDATE medicos_hospitales_servicios SET cod_hospitales = '$hospitalRegistrado', cod_servicios  = '$servicioRegistrada'   WHERE cod_medicos_hospitales_servicios = '$codServicioHospital'";
    $guardar = $conexion->query($query);


    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listamedicohospitalservicio.php');


        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al actualizar servicio cama',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listamedicohospitalservicio.php');
}else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listamedicohospitalservicio.php');

}