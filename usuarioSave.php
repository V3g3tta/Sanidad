<?php

session_start();

require 'config/db.php';


if (!empty($_POST['dni']) && !empty($_POST['nombre']) &&
        !empty($_POST['apellido']) && !empty($_POST['fechaNacimiento']) && 
        !empty($_POST['numeroSeguridadSocial'])
    ){

    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $numeroSeguridadSocial = $_POST['numeroSeguridadSocial'];


    $query = "INSERT INTO paciente VALUES (NULL, '$dni','$nombre','$apellido','$fechaNacimiento','$numeroSeguridadSocial')";
    $guardar = $conexion->query($query);

    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: usuario.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al guardar usuario',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: usuario.php');

} else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: usuario.php');
}

