<?php

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';
require '../config/protege.php';

if (!empty($_POST['dni']) && !empty($_POST['nombre']) &&
        !empty($_POST['apellido'])  && !empty($_POST['fechaNacimiento']) && !empty($_POST['codMedico']) 
    ){
    


    $codMedico = protege($_POST['codMedico']);
    $dni = protege($_POST['dni']);
    $nombre = protege($_POST['nombre']);
    $apellido = protege($_POST['apellido']);
    $fechaNacimiento = protege($_POST['fechaNacimiento']);
    $director = empty($_POST['director']) ? NULL : 1;
   

    $query = "UPDATE medicos SET dni = '$dni', apellido = '$apellido' , nombre = '$nombre' , fecha_nacimiento = '$fechaNacimiento' , director = '$director' WHERE cod_medicos = '$codMedico'";
    $guardar = $conexion->query($query);
    
   
    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaMedico.php');

        exit();
    }
    
    $mensaje = [
        'mensaje' => 'Exito al actualizar medico',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaMedico.php');

} else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaMedico.php');
}