<?php require_once '../config/accesoTotal.php';?>
<?php require_once '../layout/head.php';?>
    <div class="container mt-3">
        <div class="row justify-content-center aling-items-center">
            <?php require_once '../layout/message.php' ?>
            <table class="table table table-striped">
                <thead>
                <tr>
                    <th scope="col">Nombre hospital</th>
                    <th scope="col">Nombre servicio</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php require '../config/db.php'; $serviciohospitales = $conexion->query('SELECT * FROM v_hospitales_servicios');?>
                <?php while($serviciohospital = $serviciohospitales->fetchObject()): ?>
                    <tr>
                        <td><?= $serviciohospital ->nombre?></td>
                        <td><?= $serviciohospital ->servicios ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="../hospitalservicios/eliminarHospitalServicos.php?codServicioHospital=<?= $serviciohospital->cod_hospitales_servisios?>" onclick="return confirm('estas seguro?');" class=" btn bi bi-trash3-fill btn-outline-danger">Eliminar</a>
                                <a href="../hospitalservicios/actualizarHospitalServicios.php?codServicioHospital=<?= $serviciohospital->cod_hospitales_servisios?>"class="btn bi bi-arrow-repeat btn-outline-secondary">Actualizar</a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php require_once '../layout/footer.php' ?>