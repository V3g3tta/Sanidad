<?php

require_once '../layout/head.php';
require '../config/db.php';

if (!empty($_GET['codHistoriaClinica']) ){

    $codHisotiaCLinicas = $_GET['codHistoriaClinica'];
    $query = "SELECT * FROM historia_clinica WHERE cod_historia_clinica = '$codHisotiaCLinicas'";
    $HisotiaCLinica = $conexion->query($query)->fetchObject();

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
            <h3><span class="badge bg-secondary">ACTUALIZACIO DE HISTORIA CLINICA</span></h3>
            <form action="historiaClinicaSave.php" method="post">
                <input type="hidden" name="codHistoriaClinica" value="<?=$codHisotiaCLinicas?>">
                <div class="mb-3">
                    <label for="pacienteAdmitidoRegistrado" class="form-label">Paciente Admitido</label>
                    <select class="form-select" name="pacienteAdmitidoRegistrado" id="pacienteAdmitidoRegistrado">
                        <?php require '../config/db.php'; $pacienteAmitidos = $conexion->query('SELECT * FROM v_admisiones;');?>
                        <?php while($pacienteAmitido = $pacienteAmitidos->fetchObject()): ?>
                            <option value="<?= $pacienteAmitido->cod_admision ?>"<?= $pacienteAmitido->cod_admision == $HisotiaCLinica ->cod_admision ? 'selected' : '' ?>><?= $pacienteAmitido->nombre?> <?= $pacienteAmitido->apellido?></option>
                        <?php endwhile; ?>
                    </select>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control" id="descripcion "  value="<?=$HisotiaCLinica->descripcion?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="ingresado" class="form-label">Ingresado</label>
                        <input type="text" name="ingresado" class="form-control" id="ingresado" value="<?=$HisotiaCLinica->ingresado?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="fechaingreso" class="form-label">Fecha Ingreso</label>
                        <input type="date" name="fechaingreso" class="form-control" id="fechaingreso" value="<?=$HisotiaCLinica->fecha_ingreso?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="fechasalida" class="form-label">Fecha Salida</label>
                        <input type="date" name="fechasalida" class="form-control" id="fechasalida" value="<?=$HisotiaCLinica->fecha_salida?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="camaServicioRegistrada" class="form-label">Cama Registrada</label>
                        <select class="form-select" name="camaServicioRegistrada" id="camaServicioRegistrada">
                            <?php require '../config/db.php'; $camaservicios = $conexion->query('SELECT * FROM servicios_camas;');?>
                            <?php while($camaservicio = $camaservicios->fetchObject()): ?>
                                <option value="<?= $camaservicio->	cod_servicios_camas  ?>"<?= $camaservicio->	cod_servicios_camas  == $HisotiaCLinica ->cod_servicios_camas ?>><?= $camaservicio->cod_servicios_camas?><?=' - '?> <?= $camaservicio->cod_servicios ?></option>
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
<?php require_once '../layout/head.php';?>