<?php

require_once '../layout/head.php';
require '../config/db.php';

if (!empty($_GET['codmedicohospitalservicio']) ){

    $codmedicohospitalservicio = $_GET['codmedicohospitalservicio'];
    $query = "SELECT * FROM medicos_hospitales_servicios WHERE cod_medicos_hospitales_servicios = '$codmedicohospitalservicio'";
    $medicohospitalservicio = $conexion->query($query)->fetchObject();

}else{
    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listamedicohospitalservicio.php');


}
?>
<div class="container">
    <div class="row justify-content-center aling-items-center">
        <div class="col-md-6 col-md-offset-3 mt-3">
            <?php require_once '../layout/message.php' ?>
            <h3><span class="badge bg-secondary">ASIGNAR MEDICO HOSPITAL SERVICIO</span></h3>
            <form action="actualizarsaveHS.php" method="post">
                <input type="hidden" name="codmedicohospitalservicio" value="<?= $codmedicohospitalservicio?>">
                <div class="mb-3">
                    <label for="medicoRegistrado" class="form-label">Hospital Registrado</label>
                    <select class="form-select" name="medicoRegistrado" id="medicoRegistrado">
                        <?php require '../config/db.php'; $medicos = $conexion->query('SELECT * FROM medicos;');?>
                        <?php while($medico = $medicos->fetchObject()): ?>
                            <option value="<?= $medico->cod_medicos ?>"><?= $medico->dni ==  $medicohospitalservicio->cod_medicos ? 'selected' : '' ?>  <?= $medico->dni ?></option>
                            
                        <?php endwhile; ?>
                    </select>
                    <div class="mb-3">
                        <label for="hospitalservicioRegistrado" class="form-label">Servicio Registrado</label>
                        <select class="form-select" name="hospitalservicioRegistrado" id="hospitalservicioRegistrado">
                            <?php require '../config/db.php'; $hospitalservicios = $conexion->query('SELECT * FROM hospitales_servisios;');?>
                            <?php while($hospitalservi = $hospitalservicios->fetchObject()): ?>
                                <option value="<?= $hospitalservi->cod_hospitales_servisios ?>" <?= $hospitalservi->cod_hospitales== $medicohospitalservicio->cod_hospitales_servisios ? 'selected' : '' ?>  ><?= $hospitalservi->cod_hospitales ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <button type="submit" class="btn btn-outline-success btn-block">Crear Hospital Servicio</button>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <a href="../index.php" class="btn btn-outline-secondary btn-block">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>
