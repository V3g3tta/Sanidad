<?php

session_start();

require '../config/db.php';


if (!empty($_POST['dni']) && !empty($_POST['nombre']) &&
        !empty($_POST['apellido'])  && !empty($_POST['fechaNacimiento'])
    ){
    


    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $director = empty($_POST['director']) ? NULL : 1;


    $querySearchDni = "SELECT * FROM medicos WHERE dni = '$dni'";
    $searchDni = $conexion->query($querySearchDni)->rowCount();

    if($searchDni > 0){
        $mensaje = [
            'mensaje' => 'EL DNI YA SE ENCUETRA REGISTRADO',
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: medico.php');

        exit();
    }
   

    $query = "INSERT INTO medicos VALUES (NULL,'$dni','$apellido}','$nombre','$fechaNacimiento','$director')";
    $guardar = $conexion->query($query);
    
   
    if (!$guardar){

        $mensaje = [
            'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: medico.php');

        exit();
    }
    
    $mensaje = [
        'mensaje' => 'Exito al guardar usuario',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: medico.php');

} else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: medico.php');
}


    
        