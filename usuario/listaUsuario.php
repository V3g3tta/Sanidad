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
                    <th scope="col">Numero IPS</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php require '../config/db.php'; $usuarios = $conexion->query('SELECT * FROM paciente;');?>
                <?php while($usuario = $usuarios->fetchObject()): ?>
                    <tr>
                        <td><?= $usuario->dni?></td>
                        <td><?= $usuario->nombre ?></td>
                        <td><?= $usuario->apellido ?></td>
                        <td><?= $usuario->fecha_nacimiento ?></td>
                        <td><?= $usuario->numero_seguridad_social?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="../usuario/eliminarUsuario.php?codUsuario=<?= $usuario->cod_paciente?>" onclick="return confirm('estas seguro?');" class=" btn bi bi-trash3-fill btn-outline-danger">Eliminar</a>
                                <a href="../usuario/actualizarusuario.php?codUsuario=<?= $usuario->cod_paciente?>"class="btn bi bi-arrow-repeat btn-outline-secondary">Actualizar</a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php require_once '../layout/footer.php' ?>
