<?php require_once '../layout/head.php';?>

<div class="container">
    <div class="row justify-content-center aling-items-center">
        <div class="col-md-6 col-md-offset-3 mt-3">
            <?php require_once '../layout/message.php' ?>
            <form action="servicioSave.php" method="post">
                <div class="mb-3">
                    <label for="nombreservicio" class="form-label">Nombre Servicio</label>
                    <input type="text" name="nombreservicio" class="form-control" id="nombreservicio" required>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <button type="submit" class="btn btn-outline-primary btn-block">Crear Servicio</button>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <a href="index.php" class="btn btn-outline-warning btn-block">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once '../layout/footer.php' ?>