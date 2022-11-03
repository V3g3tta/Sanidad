<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';
require '../config/protege.php';

if (!empty($_POST['usuariosRegistrados']) && !empty(['servicioRegistrado'])
    && !empty($_POST['codamisioneso']))

{

    $codAmisiones = protege($_POST['codamisioneso']);
    $usuarioRegistrado = protege($_POST['usuariosRegistrados']);
    $medicohospitalservicioRegistrado = protege($_POST['medicoHospitaServicios']);


    $query = "UPDATE admisiones SET  cod_paciente  = '$usuarioRegistrado', cod_medicos_hospitales_servicios  = '$medicohospitalservicioRegistrado'   WHERE  cod_admision  = '$codAmisiones'";
    $guardar = $conexion->query($query);


    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaAdmisiones.php');


        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al actualizar medico hospital servicio',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaAdmisiones.php');
}else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaAdmisiones.php');

}