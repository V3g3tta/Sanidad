<?php require_once '../layout/head.php';?>
<div class="container-fluid mt-3">
    <div class="row justify-content-center aling-items-center">
        <?php require_once '../layout/message.php' ?>
        <table class="table table table-striped">
            <thead>
            <tr>
                <th scope="col">Nombre Usuario</th>
                <th scope="col">Dni</th>
                <th scope="col">Nombre Hospital</th>
                <th scope="col">Nombre Medico</th>
                <th scope="col">Servicio</th>
                <th scope="col">Fecha Registro</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php require '../config/db.php'; $admisiones = $conexion->query('SELECT * FROM v_admisiones');?>
            <?php while($admision = $admisiones->fetchObject()): ?>
                <tr>
                    <td><?= $admision->nombre . ' ' . $admision->apellido?></td>
                    <td><?= $admision->dni?></td>
                    <td><?= $admision->NombreHospital?></td>
                    <td><?= $admision->ApellidoMedico. ' ' . $admision->NombreMedico?></td>
                    <td><?= $admision->Servicio?></td>
                    <td><?= $admision->fecha_admision?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="../admisiones/eliminarAdmisiones.php?codAdmision=<?= $admision->cod_admision?>" onclick="return confirm('estas seguro?');" class="btn btn-outline-danger">Eliminar</a>
                            <a href="../admisiones/actualizarAdmisiones.php?codAdmision=<?=$admision->cod_admision?>" class="btn btn-outline-warning">Actualizar</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once '../layout/footer.php' ?>
