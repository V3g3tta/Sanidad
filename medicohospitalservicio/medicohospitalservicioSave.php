<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';

if (!empty($_POST['medicoRegistrado']) && !empty(['hospitalServicioRegistrado']))

{
    $medicoRegistrado = $_POST['medicoRegistrado'];
    $hospitalservicioRegistrado = $_POST['hospitalServicioRegistrado'];

    $querySearchMedicoHospitalServicios = "SELECT * FROM medicos_hospitales_servicios WHERE cod_hospitales_servicios = '$hospitalservicioRegistrado' AND cod_medicos  = '$medicoRegistrado'";
    $searchMedicoHospitalServicio= $conexion->query($querySearchMedicoHospitalServicios)->rowCount();

    if($searchMedicoHospitalServicio > 0 ){
        $mensaje = [
            'mensaje' => 'EL HOSPITAL YA TIENE ESTE SERVICIO REGISTRADO ',
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: medicohospitalservicio.php');

        exit();
    }



    $query = "INSERT INTO medicos_hospitales_servicios VALUES (NULL,'$medicoRegistrado',' $hospitalservicioRegistrado')";
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
