<?php require_once '../layout/head.php';?>
<div class="container mt-3">
    <div class="row justify-content-center aling-items-center">
        <?php require_once '../layout/message.php' ?>
        <table class="table table table-striped">
            <thead>
            <tr>
                <th scope="col">Nombre cama</th>
            </tr>
            </thead>
            <tbody>
            <?php require '../config/db.php'; $camas = $conexion->query('SELECT * FROM camas;');?>
            <?php while($cama = $camas->fetchObject()): ?>
                <tr>
                    <td><?= $cama->nombre_camas?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="../cama/eliminarCama.php?codCama=<?= $cama->cod_camas?>" onclick="return confirm('estas seguro?');" class="btn btn-outline-danger">Eliminar</a>
                            <a href="../cama/actualizarCama.php?codCama=<?= $cama->cod_camas?>" class="btn btn-outline-warning">Actualizar</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once '../layout/footer.php' ?>

