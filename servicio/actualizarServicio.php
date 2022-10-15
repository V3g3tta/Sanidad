<?php
require_once '../layout/head.php';
require '../config/db.php';

if (!empty($_GET['codServicio']) ){

    $codServicio = $_GET['codServicio'];
    $query = "SELECT * FROM servicios WHERE cod_servicios = '$codServicio'";
    $servicio = $conexion->query($query)->fetchObject();

}else{

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaServicio.php');
}

?>

<div class="container">
    <div class="row justify-content-center aling-items-center">
        <div class="col-md-6 col-md-offset-3 mt-3">
            <?php require_once '../layout/message.php' ?>
            <form action="servicioSave.php" method="post">
                <div class="mb-3">
                    <label for="nombreservicio" class="form-label">Nombre Servicio</label>
                    <input type="text" name="nombreservicio" class="form-control" id="nombreservicio" value="<?= $servicio->servicios?>" required>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <button type="submit" class="btn btn-outline-success btn-block">Actualizar</button>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <a href="listaServicio.php" class="btn btn-outline-dark btn-block">Volver Lista</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once '../layout/footer.php' ?>