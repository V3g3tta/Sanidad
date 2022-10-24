<?php

session_start();

require '../config/db.php';


if (!empty($_POST['nombre']) && !empty($_POST['correo']) &&
    !empty($_POST['clave'])
){

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    $hash = password_hash($clave, PASSWORD_BCRYPT);

    $rol = 'admin';

    $querySearchDni = "SELECT * FROM usuario WHERE correo = '$correo'";
    $searchDni = $conexion->query($querySearchDni)->rowCount();

    if($searchDni > 0){
        $mensaje = [
            'mensaje' => 'EL DNI YA SE ENCUETRA REGISTRADO',
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: usuario.php');

        exit();
    }

    $query = "INSERT INTO usuario VALUES (NULL, '$nombre','$correo','$hash','$rol')";
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

