<?php require_once '../layout/head.php';?>

    <div class="container">
        <div class="row justify-content-center aling-items-center">
            <div class="col-md-6 col-md-offset-3 mt-3">
                <?php require_once '../layout/message.php' ?>
                <form action="hospitalSave.php" method="post">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre Hospital</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="codCiudad" class="form-label">Ciudad</label>
                        <select class="form-select" name="codCiudad" id="codCiudad">
                            <?php require '../config/db.php'; $ciudades = $conexion->query('SELECT * FROM cuidades;');?>
                            <?php while($ciudad = $ciudades->fetchObject()): ?>
                                <option value="<?= $ciudad->cod_cuidad ?>"><?= $ciudad->cuidades ?></option>
                            <?php endwhile; ?>
                        </select>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="number" name="telefono" class="form-control" id="telefono" required>
                        </div>
                        <div class="mb-3">
                            <label for="nombre_director" class="form-label">Nombre Gerente</label>
                            <input type="text" name="nombre_director" class="form-control" id="nombre_director" required>
                        </div>
                    </div>
                    <div class="mb-3 d-grid gap-2">
                        <button type="submit" class="btn btn-outline-success btn-block">Crear Hospital</button>
                    </div>
                    <div class="mb-3 d-grid gap-2">
                        <a href="../index.php" class="btn btn-outline-dark btn-block">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once '../layout/head.php';?>