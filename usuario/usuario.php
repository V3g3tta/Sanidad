<?php require_once '../config/accesoTotal.php';?>
<?php require_once '../layout/head.php';?>

<div class="container">
    <div class="row justify-content-center aling-items-center">
        <div class="col-md-6 col-md-offset-3 mt-3">
            <?php require_once '../layout/message.php' ?>
            <h3><span class="badge bg-secondary">ASIGNAR PACIENTE</span></h3>
            <form action="usuarioSave.php" method="post">
                <div class="mb-3">
                    <label for="dni" class="form-label">Dni</label>
                    <input type="number" name="dni" class="form-control" id="dni" required>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" name="apellido" class="form-control" id="apellido" required>
                </div>
                <div class="mb-3">
                    <label for="fechaNacimiento" class="form-label">Fecha Nacimiento</label>
                    <input type="date" name="fechaNacimiento" class="form-control" id="fechaNacimiento" required>
                </div>
                <div class="mb-3">
                    <label for="numeroSeguridadSocial" class="form-label">Numero Seguridad Social</label>
                    <input type="number" name="numeroSeguridadSocial" class="form-control" id="numeroSeguridadSocial" required>
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