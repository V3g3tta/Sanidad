<?php
session_start();

require '../config/db.php';
require '../config/protege.php';

if (!empty($_POST['codAdmision']) && !empty($_POST['camaServicioRegistrada']) &&
    !empty($_POST['descripcion'])
){
    $codAmision = $_POST['codAdmision'];
    $camaServicioRegistrada = $_POST['camaServicioRegistrada'];
    $descripcion= $_POST['descripcion'];
    $ingresado = !empty($_POST['ingresado']) == NULL ? 0 : 1;


    $querySearchDni = "SELECT * FROM historia_clinica WHERE cod_admision = '$codAmision'";
    $searchDni = $conexion->query($querySearchDni)->rowCount();


    $query = "INSERT INTO historia_clinica VALUES (NULL, '$codAmision','$descripcion','$ingresado',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,'$camaServicioRegistrada')";
    $guardar = $conexion->query($query);

if (!$guardar){

    $mensaje = [
        'mensaje' => 'Error al guardar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
        'alerta' => 'danger'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: historiaClinica.php?codAdmision='. $_POST['codAdmision']);

    exit();
}

$mensaje = [
    'mensaje' => 'Exito al guardar Historia Clinica',
    'alerta' => 'success'
];

$_SESSION['mensaje'] = $mensaje;
    header('Location: historiaClinica.php?codAdmision='. $_POST['codAdmision']);

} else {

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: historiaClinica.php?codAdmision='. $_POST['codAdmision']);
}


