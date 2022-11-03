<?php require_once '../config/accesoTotal.php';?>
<?php require_once '../layout/head.php';?>

<div class="container">
    <div class="row justify-content-center aling-items-center">
        <div class="col-md-6 col-md-offset-3 mt-3">
            <?php require_once '../layout/message.php' ?>
            <h3><span class="badge bg-secondary">Medico Registrado Admision</span></h3>
            <form action="SelecionadoMedico.php" method="POST">
                <div class="mb-3">
                    <label for="CodMedicoSelecionado" class="form-label">Medico Admitido</label>
                    <select class="form-select" name="codMedicosHospitalesServicios" id="CodMedicoSelecionado">
                        <?php require '../config/db.php'; $medicoAmitidos = $conexion->query('SELECT * FROM v_medico_hospital_servicio;');?>
                        <?php while($medicoAdmitido = $medicoAmitidos->fetchObject()): ?>
                            <option value="<?= $medicoAdmitido->cod_medicos_hospitales_servicios?>"><?= $medicoAdmitido->Servicio?> - <?= $medicoAdmitido->NombreHospital?> - <?= $medicoAdmitido->NombreMedico?>  - <?= $medicoAdmitido->ApellidoMedico?></option>
                        <?php endwhile; ?>
                    </select>
                    </div>
                    <div class="mb-3 d-grid gap-2">
                        <button type="submit" class="btn btn-outline-success btn-block">Selecionar</button>
                    </div>
                    <div class="mb-3 d-grid gap-2">
                        <a href="../index.php" class="btn btn-outline-secondary btn-block">Volver</a>
                    </div>
            </form>
        </div>
    </div>
</div>

<?php require_once '../layout/footer.php';?>
