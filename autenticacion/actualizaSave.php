<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';

if (!empty($_POST['nombre']) && !empty($_POST['correo']) &&
    !empty($_POST['clave']) && !empty($_POST['codRol'])  &&
    !empty($_POST['codUsuario'])
){
    $codUsuario  = protege($_POST['codUsuario']);
    $nombre = protege($_POST['nombre']);
    $correo = protege($_POST['correo']);
    $clave = protege($_POST['clave']);
    $codrol = protege($_POST['codRol']);

    $hash = password_hash($clave, PASSWORD_BCRYPT);

    $query = "UPDATE usuario SET  nombre_completo = '$nombre',correo = ' $correo',clave = '$hash',cod_rol = '$codrol' WHERE cod_usuario = '$codUsuario'";
    $guardar = $conexion->query($query);


    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaRegistro.php');


        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al actualizar Usuario',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaRegistro.php');
}else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaRegistro.php');



}
