<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';
require '../config/protege.php';

if (!empty($_POST['medicoRegistrado']) && !empty(['medicoHospitaServicios'])
    && !empty($_POST['codMedicoHospitalServicio']))




{


    $codServicioHospital = protege($_POST['codmedicohospitalservicio']);
    $medicoRegistrado = protege($_POST['medicoRegistrado']);
    $hospitalServicioRegistrado = protege($_POST['hospitalservicioRegistrado']);

    $querySearchMedicoHospitalServicios = "SELECT * FROM medicos_hospitales_servicios WHERE cod_hospitales_servicios = '$hospitalServicioRegistrado' AND cod_medicos  = '$medicoRegistrado'";
    $searchMedicoHospitalServicio= $conexion->query($querySearchMedicoHospitalServicios)->rowCount();

    if($searchMedicoHospitalServicio > 0 ){
        $mensaje = [
            'mensaje' => 'EL HOSPITAL YA TIENE ESTE SERVICIO REGISTRADO ',
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listamedicohospitalservicio.php');

        exit();
    }


    $query = "UPDATE medicos_hospitales_servicios SET cod_medicos = '$medicoRegistrado', cod_hospitales_servicios = '$hospitalServicioRegistrado' WHERE cod_medicos_hospitales_servicios = '$codServicioHospital'";
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
        'mensaje' => 'Exito al actualizar Hospital servicio',
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