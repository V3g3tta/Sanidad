<?php require_once '../config/accesoTotal.php';?>
<?php require_once '../layout/head.php';?>

<div class="container">
    <div class="row justify-content-center aling-items-center">
        <div class="col-md-6 col-md-offset-3 mt-3">
            <?php require_once '../layout/message.php' ?>
            <h3><span class="badge bg-secondary">ASIGNAR CAMAS</span></h3>
            <form action="camaSave.php" method="post">
                <div class="mb-3">
                    <label for="nombreCama" class="form-label">Nombre Cama</label>
                    <input type="text" name="nombreCama" class="form-control" id="nombreCama" required>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <button type="submit" class="btn btn-outline-success btn-block">Crear Cama</button>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <a href="../index.php" class="btn btn-outline-secondary btn-block">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once '../layout/footer.php';?>