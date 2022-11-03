<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';

if (!empty($_POST['pacienteAdmitidoRegistrado']) && !empty($_POST['descripcion']) &&
    !empty($_POST['ingresado']) && !empty($_POST['fechaingreso']) &&
    !empty($_POST['fechasalida']) &&
    !empty($_POST['camaServicioRegistrada'])  &&
    !empty($_POST['codHistoriaClinica'])
){
    $codHistoriaClinica  = protege($_POST['codHistoriaClinica']);
    $codadmision  = protege($_POST['pacienteAdmitidoRegistrado']);
    $descripcion = protege($_POST['descripcion']);
    $ingresado = protege($_POST['ingresado']);
    $fechaingreso = protege($_POST['fechaingreso']);
    $fechasalida = protege($_POST['fechasalida']);
    $codserviciocama = protege($_POST['camaServicioRegistrada']);



    $query = "UPDATE historia_clinica SET cod_admision = '$codadmision', descripcion = '$descripcion',ingresado = '$ingresado',fecha_ingreso = '$fechaingreso',fecha_salida = '$fechasalida',cod_servicio_camas  = '$codserviciocama' WHERE cod_historia_clinica = '$codHistoriaClinica'";
    $guardar = $conexion->query($query);


    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaHisotiaClinica.php');


        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al actualizar servicio cama',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaHisotiaClinica.php');
}else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaHisotiaClinica.php ');



}
