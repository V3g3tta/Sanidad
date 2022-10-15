<?php

session_start();

require 'config/db.php';

if (!empty($_POST['nombre']) && !empty($_POST['codCiudad']) &&
    !empty($_POST['telefono']) && !empty($_POST['nombre_director']))

{
    $nombre = $_POST['nombre'];
    $codCiudad = $_POST['codCiudad'];
    $telefono = $_POST['telefono'];
    $nombre_director = $_POST['nombre_director'];

    $querySearchDirector = "SELECT * FROM hospitales WHERE nombre_director = '$nombre_director'";
    $searchDirector= $conexion->query($querySearchDirector)->rowCount();

    if($searchDirector > 0){
        $mensaje = [
            'mensaje' => 'EL DIRECTOR YA SE ENCUETRA REGISTRADO',
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: hospital.php');

        exit();
    }



    $query = "INSERT INTO hospitales VALUES (NULL,'$nombre','$codCiudad','$telefono','$nombre_director')";
    $guardar = $conexion->query($query);


    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: hospital.php');

        exit();
    }

    $mensaje = [
        'mensaje' => 'Exito al guardar usuario',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: hospital.php');

} else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: hospital.php');
}