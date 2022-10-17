<?php

session_start();

require '../config/db.php';

if (!empty($_POST['medicoRegistrado']) && !empty(['servicioRegistrado']))

{
    $medicoRegistrado = $_POST['medicoRegistrado'];
    $servicioRegistrada = $_POST['servicioRegistrado'];

    $querySearchmedico = "SELECT * FROM medicos_hospitales_servicios WHERE cod_medicos = '$medicoRegistrado'";
    $searchmedico = $conexion->query($querySearchmedico)->rowCount();

    
    $query = "INSERT INTO medicos_hospitales_servicios VALUES (NULL,'$medicoRegistrado',' $servicioRegistrada')";
    $guardar = $conexion->query($query);


    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: medicohospitalservicio.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al guardar usuario',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: medicohospitalservicio.php');

} else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: medicohospitalservicio.php');
}
