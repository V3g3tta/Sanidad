<?php

require_once '../layout/head.php';
require '../config/db.php';
require '../config/protege.php';

if (!empty($_GET['codUsuario']) ){

    $codUsuario = protege($_GET['codUsuario']);
    $query = "SELECT * FROM usuario WHERE cod_usuario = '$codUsuario'";
    $usuario = $conexion->query($query)->fetchObject();

}else{

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaRegistro.php');
}

?>
<?php require_once '../config/accesoTotal.php';?>
<div class="container">
    <div class="row justify-content-center aling-items-center">
        <div class="col-md-6 col-md-offset-3 mt-3">
            <?php require_once '../layout/message.php' ?>
            <h3><span class="badge bg-secondary">ACTUALIZAR USUARIO</span></h3>
            <form action="actualizaSave.php" method="post">
                <input type="hidden" name="codUsuario" value="<?=$codUsuario?>">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre Apellido</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" value="<?= $usuario->nombre_completo?>"  required>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electronico</label>
                    <input type="email" name="correo" class="form-control" id="correo" value="<?= $usuario->correo?>" required>
                </div>
                <div class="mb-3">
                    <label for="clave" class="form-label">Contraseña</label>
                    <input type="password" name="clave" class="form-control" id="clave" required>
                </div>
                <div class="mb-3">
                    <label for="codRol" class="form-label">Rol Usuario</label>
                    <select class="form-select" name="codRol" id="codRol">
                        <?php require '../config/db.php'; $roles = $conexion->query('SELECT * FROM roles;');?>
                        <?php while($rol = $roles->fetchObject()): ?>
                            <option value="<?= $rol->cod_rol ?>"><?= $rol->cod_rol == $usuario->cod_rol ? 'selected' : '' ?> <?= $rol->roles ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <button type="submit" class="btn btn-outline-success btn-block">Actualizar</button>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <a href="listaRegistro.php" class="btn btn-outline-secondary btn-block">Lista</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once '../layout/head.php';?>
