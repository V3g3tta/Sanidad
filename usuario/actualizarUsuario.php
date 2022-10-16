<?php

require_once '../layout/head.php';
require '../config/db.php';

if (!empty($_GET['codUsuario']) ){

    $codUsuario = $_GET['codUsuario'];
    $query = "SELECT * FROM paciente WHERE cod_paciente = '$codUsuario'";
    $usuario = $conexion->query($query)->fetchObject();

}else{

    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: listaUsuario.php');
}

?>
<div class="container">
    <div class="row justify-content-center aling-items-center">
        <div class="col-md-6 col-md-offset-3 mt-3">
            <?php require_once '../layout/message.php' ?>
            <h3><span class="badge bg-secondary">ACTUALIZAR SERVICIO</span></h3>
            <form action="actualizarSave.php" method="post">
                <div class="mb-3">
                    <label for="dni" class="form-label">Dni</label>
                    <input type="number" name="dni" class="form-control" id="dni" value="<?= $usuario->dni?>" required>
                </div>
                <input type="hidden" name="codUsuario" value="<?= $codUsuario ?>">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" value="<?= $usuario->nombre?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" name="apellido" class="form-control" id="apellido" value="<?= $usuario->apellido?>"required>
                </div>
                <div class="mb-3">
                    <label for="fechaNacimiento" class="form-label">Fecha Nacimiento</label>
                    <input type="date" name="fechaNacimiento" class="form-control" id="fechaNacimiento" value="<?= $usuario->fecha_nacimiento?>" required>
                </div>
                <div class="mb-3">
                    <label for="numeroSeguridadSocial" class="form-label">Numero Seguridad Social</label>
                    <input type="number" name="numeroSeguridadSocial" class="form-control" id="numeroSeguridadSocial" value="<?= $usuario->numero_seguridad_social?>" required>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <button type="submit" class="btn btn-outline-success btn-block">actualiza Usuario</button>
                </div>
                <div class="mb-3 d-grid gap-2">
                    <a href="listaUsuario.php" class="btn btn-outline-secondary btn-block">Volver Lista</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once '../layout/footer.php' ?>