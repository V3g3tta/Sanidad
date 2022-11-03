<?php

require_once '../layout/head.php';
require_once '../config/db.php';

if (!empty($_GET['codAdmision']) ){

    $codAdmicion = protege($_GET['codAdmision']);
    $query = "SELECT * FROM v_admisiones WHERE cod_admision = '$codAdmicion'";
    $admicion = $conexion->query($query)->fetchObject();

}else{
    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: SelecionadoMedico.php');

}
?>
<?php require_once '../config/accesoTotal.php';?>
    <div class="container">
        <div class="row justify-content-center aling-items-center">
            <div class="col-md-6 col-md-offset-3 mt-3">
                <?php require_once '../layout/message.php' ?>
                <h3><span class="badge bg-secondary">ASIGNACION DE HISTORIA CLINICA</span></h3>
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label">Información Admisión</label>
                        <input class="form-control" disabled type="text" value="<?= $admicion->nombre .' '. $admicion->apellido . ' - Fecha Admision: ' . $admicion->fecha_admision ?>">
                    </div>
                </div>
                <form action="historiaClinicaSave.php" method="post">
                    <input value="<?=$_GET['codAdmision']?>" name="codAdmision" type="hidden">
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea class="form-control" rows="5" name="descripcion"></textarea>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="ingresado">
                            <label class="form-check-label" for="flexCheckChecked">
                                ingresado
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="camaServicioRegistrada" class="form-label">Cama Registrada</label>
                        <select class="form-select" name="camaServicioRegistrada" id="camaServicioRegistrada">
                            <?php $camaservicios = $conexion->query('SELECT * FROM v_servicios_camas;');?>
                            <?php while($camaservicio = $camaservicios->fetchObject()): ?>
                                <option value="<?= $camaservicio->cod_servicios_camas ?>"><?= $camaservicio->nombre_camas?><?=' - '?> <?= $camaservicio->servicios?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3 d-grid gap-2">
                        <button type="submit" class="btn btn-outline-success btn-block">Crear Usuario</button>
                    </div>
                    <div class="mb-3 d-grid gap-2">
                        <a href="../index.php" class="btn btn-outline-secondary btn-block">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once '../layout/footer.php';?>