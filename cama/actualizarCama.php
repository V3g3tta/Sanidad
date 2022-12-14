<?php
require_once '../config/accesoTotal.php';
require_once '../layout/head.php';
require '../config/db.php';
require '../config/protege.php';

if (!empty($_GET['codCama']) ){

    $codCama = protege($_GET['codCama']);
    $query = "SELECT * FROM camas WHERE cod_camas = '$codCama'";
    $Cama = $conexion->query($query)->fetchObject();

}else{

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaCama.php');
}

?>
<?php require_once '../config/accesoTotal.php';?>
<div class="container">
    <div class="row justify-content-center aling-items-center">
        <div class="col-md-6 col-md-offset-3 mt-3">
            <?php require_once '../layout/message.php' ?>
            <h3><span class="badge bg-secondary">Actualizar Cama</span></h3>
            <form action="actualizarSave.php" method="post">
                <div class="mb-3">
                    <label for="nombreCama" class="form-label">Nombre Cama</label>
                    <input type="text" name="nombreCama" class="form-control" id="nombreCama" value="<?= $Cama->nombre_camas?>" required>
                </div>
                <input type="hidden" name="codCama" value="<?= $codCama ?>">
                <div class="mb-3 d-grid gap-2">
                    <button type="submit" class="btn btn-outline-success btn-block">Actualizar</button>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <div class="mb-3 d-grid gap-2">
                        <a href="listaCama.php" class="btn btn-outline-secondary btn-block">Volver Lista</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once '../layout/footer.php' ?>
