<?php
session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';

if (!empty($_GET['codServicioHospital']) ){

    $codServicioHospital = $_GET['codServicioHospital'];

    $querySearchDni = "SELECT * FROM medicos_hospitales_servicios WHERE cod_hospitales_servicios  = '$codServicioHospital'";
    $searchDni = $conexion->query($querySearchDni)->rowCount();

    if($searchDni > 0){
        $mensaje = [
            'mensaje' => 'ESTE HOSPITAL SERVICIO NO LO PUEDES ELIMINAR SI TIENE ASIGNADO UN MEDICO',
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaHospitalServicios.php');

        exit();
    }




    $query = "DELETE FROM hospitales_servisios WHERE cod_hospitales_servisios = '$codServicioHospital'";
    $eliminar = $conexion->query($query);


    if (!$eliminar){

        $mensaje = ['mensaje' => 'Error al eliminar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaHospitalServicios.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al eliminar servicio cama',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaHospitalServicios.php');

}else{

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaHospitalServicios.php');
}
