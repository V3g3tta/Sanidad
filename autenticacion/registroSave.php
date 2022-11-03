<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';
require '../config/protege.php';


if (!empty($_POST['nombre']) && !empty($_POST['correo']) &&
    !empty($_POST['clave']) && !empty($_POST['codRol'])
){

    $nombre = protege($_POST['nombre']);
    $correo = protege($_POST['correo']);
    $clave = protege($_POST['clave']);
    $codrol = protege($_POST['codRol']);

    $hash = password_hash($clave, PASSWORD_BCRYPT);


    $querySearchDni = "SELECT * FROM usuario WHERE correo = '$correo'";
    $searchDni = $conexion->query($querySearchDni)->rowCount();

    if($searchDni > 0){
        $mensaje = [
            'mensaje' => 'EL CORREO YA SE ENCUETRA REGISTRADO',
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: usuario.php');

        exit();
    }

    $query = "INSERT INTO usuario VALUES (NULL, '$nombre','$correo','$hash','$codrol')";
    $guardar = $conexion->query($query);


    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: registro.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al guardar usuario',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: registro.php');

} else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: registro.php');
}

