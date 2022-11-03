<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}


require '../config/db.php';
require '../config/protege.php';

if (!empty($_POST['dni']) && !empty($_POST['nombre']) &&
    !empty($_POST['apellido']) && !empty($_POST['fechaNacimiento']) &&
    !empty($_POST['numeroSeguridadSocial']) && !empty($_POST['codUsuario'])
){


    $codUsuario = protege($_POST['codUsuario']);
    $dni = protege($_POST['dni']);
    $nombre = protege($_POST['nombre']);
    $apellido = protege($_POST['apellido']);
    $fechaNacimiento = protege($_POST['fechaNacimiento']);
    $numeroSeguridadSocial = protege($_POST['numeroSeguridadSocial']);


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