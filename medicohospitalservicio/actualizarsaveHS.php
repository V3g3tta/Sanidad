<?php

session_start();

require '../config/db.php';


if (!empty($_POST['usuariosRegistrados']) && !empty(['medicoHospitaServicios'])
    && !empty($_POST['codadmisiones']))


{

    $codServicioHospital = $_POST['codmedicohospitalservicio'];
    $medicoRegistrado = $_POST['medicoRegistrado'];
    $hospitalServicioRegistrado = $_POST['hospitalservicioRegistrado'];

    $querySearchMedicoHospitalServicios = "SELECT * FROM medicos_hospitales_servicios WHERE cod_hospitales_servicios = '$hospitalServicioRegistrado' AND cod_medicos  = '$medicoRegistrado'";
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