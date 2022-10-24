<?php 

session_start();

if (empty($_SESSION['correo'])){
    header('Location: /autenticacion/login.php');
}

require '../config/db.php';


if (!empty($_GET['codMedico']) ){

    $codMedico = $_GET['codMedico'];

    $querySearchDni = "SELECT * FROM medicos_hospitales_servicios WHERE cod_medicos  = '$codMedico'";
    $searchDni = $conexion->query($querySearchDni)->rowCount();

    if($searchDni > 0){
        $mensaje = [
            'mensaje' => 'ESTE MEDICO NO LO PUEDES ELIMINAR SI TIENE ASIGNADO UNA HOSPITAL SERVICIO',
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaMedico.php');

        exit();
    }


    $query = "DELETE FROM medicos WHERE cod_medicos = '$codMedico'";
    $eliminar = $conexion->query($query);
    
   
    if (!$eliminar){

        $mensaje = [
            'mensaje' => 'Error al eliminar datos ' . $conexion->errorInfo()[0] . ' - ' . $conexion->errorInfo()[2],
            'alerta' => 'danger'
        ];

        $_SESSION['mensaje'] = $mensaje;
        header('Location: listaMedico.php');

        exit();
    }
    
    $mensaje = [
        'mensaje' => 'Exito al eliminar medico',
        'alerta' => 'success'
    ];

    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaMedico.php');

}else{

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaMedico.php');
}