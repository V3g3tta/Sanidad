<?php require_once '../layout/head.php';?>

    <div class="container">
        <div class="row justify-content-center aling-items-center">
            <div class="col-md-6 col-md-offset-3 mt-3">
                <?php require_once '../layout/message.php' ?>
                <h3><span class="badge bg-secondary">ASIGNAR USUARIO</span></h3>
                <form action="registroSave.php" method="post">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre Apellido</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo Electronico</label>
                        <input type="email" name="correo" class="form-control" id="correo" required>
                    </div>
                    <div class="mb-3">
                        <label for="clave" class="form-label">Contraseña</label>
                        <input type="password" name="clave" class="form-control" id="clave" required>
                    </div>
                    <div class="mb-3 d-grid gap-2">
                        <button type="submit" class="btn btn-outline-success btn-block">Crear Administrador</button>
                    </div>
                    <div class="mb-3 d-grid gap-2">
                        <a href="../index.php" class="btn btn-outline-secondary btn-block">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require_once '../layout/head.php';?>