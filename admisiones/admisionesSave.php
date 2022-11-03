<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';

if (!empty($_POST['usuariosRegistrados']) && !empty(['medicoHospitaServicios"']))

{
    $usuariosRegistrada = protege($_POST['usuariosRegistrados']);
    $medicoHospitalServicioRegistrada = $_POST['medicoHospitaServicios'];

    $querySearchAdmisiones = "SELECT * FROM admisiones WHERE cod_paciente = '$usuariosRegistrada' AND cod_medicos_hospitales_servicios  = '$medicoHospitalServicioRegistrada'";
    $searchAdmisione = $conexion->query($querySearchAdmisiones)->rowCount();

    if($searchAdmisione > 0){
        $mensaje = [
            'mensaje' => 'Esta cama ya tiene asiganado un servicio',
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: admisiones.php');

        exit();
    }

    $query = "INSERT INTO admisiones VALUES (NULL,'$usuariosRegistrada', '$medicoHospitalServicioRegistrada', CURRENT_TIMESTAMP)";

    $guardar = $conexion->query($query);


    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: admisiones.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al guardar usuario',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: admisiones.php');

} else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: serviciocama.php');
}




