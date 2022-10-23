<?php require_once '../layout/head.php';?>
<div class="container mt-3">
    <div class="row justify-content-center aling-items-center">
        <?php require_once '../layout/message.php' ?>
        <table class="table table table-striped">
            <thead>
            <tr>
                <th scope="col">Nombre cama</th>
                <th scope="col">Nombre servicio</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php require '../config/db.php'; $serviciocamas = $conexion->query('SELECT * FROM v_servicios_camas;');?>
            <?php while($serviciocama = $serviciocamas->fetchObject()): ?>
                <tr>
                    <td><?= $serviciocama ->nombre_camas?></td>
                    <td><?= $serviciocama ->servicios?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="../serviciocama/eliminarServicioCama.php?codServicioCama=<?= $serviciocama->cod_servicios_camas?>" onclick="return confirm('estas seguro?');" class=" btn bi bi-trash3-fill btn-outline-danger">Eliminar</a>
                            <a href="../serviciocama/actualizarServicioCama.php?codServicioCama=<?= $serviciocama->cod_servicios_camas?>" class="btn bi bi-arrow-repeat btn-outline-secondary">Actualizar</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once '../layout/footer.php' ?>
