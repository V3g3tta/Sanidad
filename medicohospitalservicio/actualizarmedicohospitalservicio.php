<?php

require_once '../layout/head.php';
require '../config/db.php';
require '../config/protege.php';

if (!empty($_GET['codMedicoHospitalServicio']) ){

    $codmedicohospitalservicio = protege($_GET['codMedicoHospitalServicio']);
    $query = "SELECT * FROM medicos_hospitales_servicios WHERE cod_medicos_hospitales_servicios = '$codmedicohospitalservicio'";
    $medicoHospitalServicio = $conexion->query($query)->fetchObject();

}else{
    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listamedicohospitalservicio.php');


}
?>
<?php require_once '../config/accesoTotal.php';?>
<div class="container">
    <div class="row justify-content-center aling-items-center">
        <div class="col-md-6 col-md-offset-3 mt-3">
            <?php require_once '../layout/message.php' ?>
            <h3><span class="badge bg-secondary">ACTUALIZAR MEDICO HOSPITAL SERVICIO</span></h3>
            <form action="actualizarSave.php" method="post">
                <input type="hidden" name="codMedicoHospitalServicio" value="<?= $codmedicohospitalservicio ?>">
                <div class="mb-3">
                    <label for="medicoRegistrado" class="form-label">Medico Registrado</label>
                    <select class="form-select" name="medicoRegistrado" id="medicoRegistrado">
                        <?php require '../config/db.php'; $medicos = $conexion->query('SELECT * FROM medicos;');?>
                        <?php while($medico = $medicos->fetchObject()): ?>
                            <option value="<?= $medico->cod_medicos ?>"<?= $medico->cod_medicos == $medicoHospitalServicio ->cod_medicos ? 'selected' : '' ?>  ><?= $medico->apellido ?><?= ' ' ?><?= $medico->nombre ?></option>
                        <?php endwhile; ?>
                    </select>
                    <div class="mb-3">
                        <label for="medicoHospitaServicios" class="form-label">Hospital Servicio Registrado</label>
                        <select class="form-select" name="medicoHospitaServicios" id="medicoHospitaServicios">
                            <?php require '../config/db.php'; $medicohospitalservicioss = $conexion->query('SELECT * FROM v_hospitales_servicios');?>
                            <?php while($medicohospitalservicios = $medicohospitalservicioss->fetchObject()): ?>
                                <option value="<?= $medicohospitalservicios->cod_hospitales_servisios ?> "<?= $medicohospitalservicios->cod_hospitales_servisios == $medicoHospitalServicio ->cod_hospitales_servicios ? 'selected' : '' ?>><?= $medicohospitalservicios->nombre ?> <?= '-'?> <?= $medicohospitalservicios->servicios ?>  </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <button type="submit" class="btn btn-outline-success btn-block">Actualizar Medico hospital servicio</button>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <a href="listamedicohospitalservicio.php" class="btn btn-outline-secondary btn-block">Listados</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once '../layout/head.php';?>
