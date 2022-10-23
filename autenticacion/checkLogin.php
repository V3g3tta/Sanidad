<?php

session_start();

if (!empty($_POST['correo']) && !empty($_POST['clave'])){

    require_once '../config/db.php';

    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    $query = "SELECT * FROM usuario WHERE correo = '$correo'";
    $usuarioData = $conexion->query($query)->fetchObject();

    if (!$usuarioData){
        $mensaje = [
            'mensaje' => 'Correo o clave incorrecta',
            'alerta' => 'danger'
        ];
        $_SESSION['mensaje'] = $mensaje;
        header('Location: login.php');
    }

    if (password_verify($clave, $usuarioData->clave)){
        $_SESSION['correo'] = $usuarioData->correo;
        $_SESSION['rol'] = $usuarioData->rol;
        $_SESSION['nombre'] = $usuarioData->nombre_completo;

    }

    $mensaje = [
        'mensaje' => 'Correo o clave incorrecta',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: login.php');


}else{

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: login.php');
}