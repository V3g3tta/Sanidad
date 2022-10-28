<?php require_once '../config/accesoTotal.php';?>
<?php require_once '../layout/head.php';?>
<div class="container mt-3">
    <div class="row justify-content-center aling-items-center">
        <?php require_once '../layout/message.php' ?>
        <table class="table table table-striped">
            <thead>
            <tr>
                <th scope="col">Nombre Apellido</th>
                <th scope="col">Correo Electronico</th>
                <th scope="col">Cargo</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php require '../config/db.php'; $usuarios = $conexion->query('SELECT * FROM v_roles;');?>
            <?php while($usuario = $usuarios->fetchObject()): ?>
                <tr>
                    <td><?= $usuario->nombre_completo?></td>
                    <td><?= $usuario->correo ?></td>
                    <td><?= $usuario->roles ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="../autenticacion/eliminarRegistro.php?codUsuario=<?= $usuario->cod_usuario?>" onclick="return confirm('estas seguro?');" class=" btn bi bi-trash3-fill btn-outline-danger">Eliminar</a>
                            <a href="../autenticacion/actualizarRegistro.php?codUsuario=<?= $usuario->cod_usuario?>"class="btn bi bi-arrow-repeat btn-outline-secondary">Actualizar</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once '../layout/footer.php' ?>

