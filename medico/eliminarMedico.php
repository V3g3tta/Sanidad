<?php 

session_start();

require '../config/db.php';


if (!empty($_GET['codMedico']) ){

    $codMedico = $_GET['codMedico'];

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