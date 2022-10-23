<?php require_once '../layout/head.php';?>
<div class="container mt-3">
    <div class="row justify-content-center aling-items-center">
        <?php require_once '../layout/message.php' ?>
        <table class="table table table-striped">
            <thead>
            <tr>
                <th scope="col">Nombre Servicio</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php require '../config/db.php'; $servicios = $conexion->query('SELECT * FROM servicios;');?>
            <?php while($servicio = $servicios->fetchObject()): ?>
                <tr>
                    <td><?= $servicio->servicios?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="../servicio/eliminarServicio.php?codServicio=<?= $servicio->cod_servicios?>" onclick="return confirm('estas seguro?');" class=" btn bi bi-trash3-fill btn-outline-danger">Eliminar</a>
                            <a href="../servicio/actualizarServicio.php?codServicio=<?= $servicio->cod_servicios?>" class="btn bi bi-arrow-repeat btn-outline-secondary">Actualizar</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once '../layout/footer.php' ?>