<?php require_once '../layout/head.php';?>
<div class="container mt-3">
    <div class="row justify-content-center aling-items-center">
        <?php require_once '../layout/message.php' ?>
        <table class="table table table-striped">
            <thead>
                <tr>
                <th scope="col">Dni</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">Es Director?</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php require '../config/db.php'; $medicos = $conexion->query('SELECT * FROM medicos;');?>
                <?php while($medico = $medicos->fetchObject()): ?>
                    <tr>
                        <td><?= $medico->dni?></td>
                        <td><?= $medico->apellido ?></td>
                        <td><?= $medico->nombre ?></td>
                        <td><?= $medico->fecha_nacimiento ?></td>
                        <td><?= $medico->director == 1 ? 'Es Director!' : 'No es director!' ?> </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="../medico/eliminarMedico.php?codMedico=<?= $medico->cod_medicos?>" onclick="return confirm('estas seguro?');" class="btn btn-outline-danger">Eliminar</a>
                                <a href="../medico/actualizarMedico.php?codMedico=<?= $medico->cod_medicos?>" class="btn btn-outline-warning">Actualizar</a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../layout/footer.php' ?>