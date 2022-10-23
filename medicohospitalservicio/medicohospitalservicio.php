<?php require_once '../layout/head.php';?>


<div class="container">
    <div class="row justify-content-center aling-items-center">
        <div class="col-md-6 col-md-offset-3 mt-3">
            <?php require_once '../layout/message.php' ?>
            <h3><span class="badge bg-secondary">ASIGNAR MEDICO HOSPITAL SERVICIO</span></h3>
            <form action="medicohospitalservicioSave.php" method="post">
                <div class="mb-3">
                    <label for="medicoRegistrado" class="form-label">Medico Registrado</label>
                    <select class="form-select" name="medicoRegistrado" id="medicoRegistrado">
                        <?php require '../config/db.php'; $medicos = $conexion->query('SELECT * FROM medicos;');?>
                        <?php while($medico = $medicos->fetchObject()): ?>
                            <option value="<?= $medico->cod_medicos ?>"><?= $medico->dni?>-<?=$medico->apellido?>-<?= $medico->nombre?></option>
                        <?php endwhile; ?>
                    </select>
                    <div class="mb-3">
                        <label for="hospitalServicioRegistrado" class="form-label"> Hospital Servicio Registrado</label>
                        <select class="form-select" name="hospitalServicioRegistrado" id="hospitalServicioRegistrado">
                            <?php require '../config/db.php'; $medicohospitalservicio = $conexion->query('SELECT * FROM v_hospitales_servicios;');?>
                            <?php while($medicohospitalservicios = $medicohospitalservicio->fetchObject()): ?>
                                <option value="<?= $medicohospitalservicios->cod_hospitales_servisios  ?>"><?= $medicohospitalservicios->nombre ?>-<?= $medicohospitalservicios->servicios ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <button type="submit" class="btn btn-outline-success btn-block">Crear Medico hospital servicio</button>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <a href="../index.php" class="btn btn-outline-secondary btn-block">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once '../layout/head.php';?>
