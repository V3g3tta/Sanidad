<?php require_once '../layout/head.php';?>
<?php

require '../config/db.php';


if (!empty($_GET['codMedico']) ){

    $codMedico = $_GET['codMedico'];
    $query = "SELECT * FROM medicos WHERE cod_medicos = '$codMedico'";
    $medico = $conexion->query($query)->fetchObject();

}else{

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaMedico.php');
}

?>

<div class="container">
    <div class="row justify-content-center aling-items-center">
        <div class="col-md-6 col-md-offset-3 mt-3">
            <?php require_once '../layout/message.php' ?>
            <form action="actualizarSave.php" method="post">
                <div class="mb-3">
                    <label for="dni" class="form-label">Dni</label>
                    <input type="number" name="dni" class="form-control" id="dni" value="<?= $medico->dni?>" required>
                </div>
                <input type="hidden" name="codMedico" value="<?= $codMedico ?>">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" value="<?= $medico->nombre?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" name="apellido" class="form-control" id="apellido" value="<?= $medico->apellido?>" required>
                </div>
                <div class="mb-3">
                    <label for="fechaNacimiento" class="form-label">Fecha Nacimiento</label>
                    <input type="date" name="fechaNacimiento" class="form-control" id="fechaNacimiento" value="<?= $medico->fecha_nacimiento?>" required>
                </div>
                <div class="form-check">
                    <label for="director" class="form-check-label">Director De Hospital</label>
                    <input type="checkbox" name="director" class="form-check-input" id="director" <?= $medico->director == 1 ? 'checked' : '' ?>>
                    
                </div>
                <div class="mb-3 d-grid gap-2">
                    <button type="submit" class="btn btn-outline-primary btn-block">Actualizar Usuario</button>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <a href="listaMedico.php" class="btn btn-outline-warning btn-block">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once '../layout/footer.php' ?>