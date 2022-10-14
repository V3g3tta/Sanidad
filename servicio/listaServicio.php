<?php require_once '../layout/head.php';?>
<div class="container mt-3">
    <div class="row justify-content-center aling-items-center">
        <?php require_once '../layout/message.php' ?>
        <table class="table table table-striped">
            <thead>
            <tr>
                <th scope="col">Nombre Servicio</th>
            </tr>
            </thead>
            <tbody>
            <?php require '../config/db.php'; $servicios = $conexion->query('SELECT * FROM servicios;');?>
            <?php while($servicio = $servicios->fetchObject()): ?>
                <tr>
                    <td><?= $servicio->servicios?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="../cama/eliminarServicio.php?codServicio=<?= $servicio->cod_servicios?>" onclick="return confirm('estas seguro?');" class="btn btn-outline-danger">Eliminar</a>
                            <a href="../cama/actualizarServicio.php?codServicio=<?= $servicio->cod_servicios?>" class="btn btn-outline-warning">Actualizar</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once '../layout/footer.php' ?>