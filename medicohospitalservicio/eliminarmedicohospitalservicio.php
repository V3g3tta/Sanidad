<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';

if (!empty($_GET['codMedicoHospitalServicio'])){

    $codmedicohospitalservicio = protege($_GET['codMedicoHospitalServicio']);

    $query = "DELETE FROM medicos_hospitales_servicios WHERE  cod_medicos_hospitales_servicios= '$codmedicohospitalservicio'";
    $eliminar = $conexion->query($query);


    if (!$eliminar){

        $mensaje = ['mensaje' => 'Error al eliminar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location:listamedicohospitalservicio.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al eliminar medico hospital servicio',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listamedicohospitalservicio.php');

}else{

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listamedicohospitalservicio.php');
}