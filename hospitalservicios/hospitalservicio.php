<?php require_once '../config/accesoTotal.php';?>
<?php require_once '../layout/head.php';?>


    <div class="container">
        <div class="row justify-content-center aling-items-center">
            <div class="col-md-6 col-md-offset-3 mt-3">
                <?php require_once '../layout/message.php' ?>
                <h3><span class="badge bg-secondary">ASIGNAR SERVICIO HOSPITAL</span></h3>
                <form action="hospitalservicioSave.php" method="post">
                    <div class="mb-3">
                        <label for="hospitalRegistrado" class="form-label">Hospital Registrado</label>
                        <select class="form-select" name="hospitalRegistrado" id="hospitalRegistrado">
                            <?php require '../config/db.php'; $hospitales = $conexion->query('SELECT * FROM hospitales;');?>
                            <?php while($hospital = $hospitales->fetchObject()): ?>
                                <option value="<?= $hospital->cod_hospitales ?>"><?= $hospital->nombre?></option>
                            <?php endwhile; ?>
                        </select>
                        <div class="mb-3">
                            <label for="servicioRegistrado" class="form-label">Servicio Registrado</label>
                            <select class="form-select" name="servicioRegistrado" id="servicioRegistrado">
                                <?php require '../config/db.php'; $servicios = $conexion->query('SELECT * FROM servicios;');?>
                                <?php while($servicio = $servicios->fetchObject()): ?>
                                    <option value="<?= $servicio->cod_servicios  ?>"><?= $servicio->servicios ?></option>
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

<?php require_once '../layout/footer.php';?>