
<?php require_once '../layout/head.php';?>
    <div class="container mt-3">
         <div class="row justify-content-center aling-items-center">
            <?php require_once '../layout/message.php' ?>
            <table class="table table table-striped">
                <thead>
                <tr>
                    <th scope="col">Nombre Hospital</th>
                    <th scope="col">Cuidad</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Nombre Director</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php require '../config/db.php'; $hospitales = $conexion->query('SELECT * FROM v_hospital;');?>
                <?php while($hospital = $hospitales->fetchObject()): ?>
                    <tr>
                        <td><?= $hospital->nombre?></td>
                        <td><?= $hospital->cuidades ?></td>
                        <td><?= $hospital->telefono ?></td>
                        <td><?= $hospital->nombre_director ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="../hospital/eliminarHospital.php?codHospital=<?= $hospital->cod_hospitales?>" onclick="return confirm('estas seguro?');" class="btn btn-outline-danger">Eliminar</a>
                                <a href="../hospital/actualizarHospital.php?codHospital=<?= $hospital->cod_hospitales?>" class="btn btn-outline-warning">Actualizar</a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
         </div>
    </div>
<?php require_once '../layout/footer.php' ?>