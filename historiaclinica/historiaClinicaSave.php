<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';


if (!empty($_POST['pacienteAdmitidoRegistrado']) && !empty($_POST['descripcion']) &&
    !empty($_POST['ingresado']) && !empty($_POST['fechaingreso']) &&
    !empty($_POST['fechasalida']) &&
    !empty($_POST['camaServicioRegistrada'])
){

    $codadmision  = $_POST['pacienteAdmitidoRegistrado'];
    $descripcion = $_POST['descripcion'];
    $ingresado = $_POST['ingresado'];
    $fechaingreso = $_POST['fechaingreso'];
    $fechasalida = $_POST['fechasalida'];
    $codserviciocama = $_POST['camaServicioRegistrada'];



    $query = "INSERT INTO historia_clinica VALUES (NULL,'$codadmision','$descripcion','$ingresado','$fechaingreso','$fechasalida','$codserviciocama')";
    $guardar = $conexion->query($query);

    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: historiaClinica.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al guardar usuario',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: historiaClinica.php');

} else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: historiaClinica.php');
}

