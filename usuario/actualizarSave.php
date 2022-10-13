<?php

session_start();

require '../config/db.php';

if (!empty($_POST['dni']) && !empty($_POST['nombre']) &&
    !empty($_POST['apellido']) && !empty($_POST['fechaNacimiento']) &&
    !empty($_POST['numeroSeguridadSocial']) && !empty($_POST['codUsuario'])
){


    $codUsuario = $_POST['codUsuario'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $numeroSeguridadSocial = $_POST['numeroSeguridadSocial'];


    $query = "UPDATE paciente SET dni = '$dni', apellido = '$apellido' , nombre = '$nombre' , fecha_nacimiento = '$fechaNacimiento' ,numero_seguridad_social = '$numeroSeguridadSocial' WHERE cod_paciente = '$codUsuario'";
    $guardar = $conexion->query($query);


    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaUsuario.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al actualizar usuario',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaUsuario.php');

} else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaUsuario.php');
}