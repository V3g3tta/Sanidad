<?php

session_start();
if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';
require '../config/protege.php';

if (!empty($_POST['nombre']) && !empty($_POST['codCiudad']) &&
    !empty($_POST['telefono']) && !empty($_POST['nombre_director'])
    && !empty($_POST['codHospital']))

{
    $codHospital = protege($_POST['codHospital']);
    $nombre = protege($_POST['nombre']);
    $codCiudad = protege($_POST['codCiudad']);
    $telefono = protege($_POST['telefono']);
    $nombre_director = protege($_POST['nombre_director']);

    $query = "UPDATE hospitales SET nombre = '$nombre', cod_ciudades  = '$codCiudad' , telefono = '$telefono' , nombre_director = '$nombre_director'  WHERE cod_hospitales = '$codHospital'";
    $guardar = $conexion->query($query);

    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaHospital.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al actualizar hospital',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaHospital.php');

} else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaHospital.php');

}