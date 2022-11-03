<?php

require_once '../layout/head.php';
require '../config/db.php';
require '../config/protege.php';

if (!empty($_GET['codAdmision']) ){

    $codAdmisiones = protege($_GET['codAdmision']);
    $query = "SELECT * FROM admisiones WHERE cod_admision = '$codAdmisiones'";
    $admision = $conexion->query($query)->fetchObject();

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
            <h3><span class="badge bg-secondary">ASIGNAR MEDICO HOSPITAL SERVICIO</span></h3>
            <form action="actualizarSave.php" method="post">
                <input type="hidden" name="codamisioneso" value="<?= $codAdmisiones?>">
                <div class="mb-3">
                    <label for="usuariosRegistrados" class="form-label">Usuarios Registrados</label>
                    <select class="form-select" name="usuariosRegistrados" id="usuariosRegistrados">
                        <?php require '../config/db.php'; $usuarios = $conexion->query('SELECT * FROM paciente');?>
                        <?php while($usuario = $usuarios->fetchObject()): ?>
                            <option value="<?= $usuario->cod_paciente?>" <?= $usuario->cod_paciente == $admision ->cod_paciente ? 'selected' : '' ?>> <?= $usuario->nombre?><?= ' ' ?><?= $usuario->apellido?></option>
                        <?php endwhile; ?>
                    </select>
                    <div class="mb-3">
                        <label for="medicoHospitaServicios" class="form-label">Medico Hospital Servicio Registrado</label>
                        <select class="form-select" name="medicoHospitaServicios" id="medicoHospitaServicios">
                            <?php require '../config/db.php'; $medicohospitalservicio = $conexion->query('SELECT * FROM v_medico_hospital_servicio');?>
                            <?php while($medicohospitalservicios = $medicohospitalservicio->fetchObject()): ?>
                                <option value="<?= $medicohospitalservicios->cod_medicos_hospitales_servicios ?>"<?= $medicohospitalservicios->cod_medicos_hospitales_servicios == $admision ->cod_medicos_hospitales_servicios ? 'selected' : '' ?>><?= $medicohospitalservicios->ApellidoMedico ?> - <?= $medicohospitalservicios->NombreMedico?> - <?= $medicohospitalservicios->NombreHospital ?> - <?= $medicohospitalservicios->Servicio ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <button type="submit" class="btn btn-outline-success btn-block">Actualizar Medico Hospital Servicio</button>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <a href="listaAdmisiones.php" class="btn btn-outline-secondary btn-block">Listado</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once '../layout/head.php';?>

