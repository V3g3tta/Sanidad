<?php require_once '../layout/head.php';?>
<div class="container-fluid mt-3">
    <div class="row justify-content-center aling-items-center">
        <?php require_once '../layout/message.php' ?>
        <table class="table table table-striped">
            <thead>
            <tr>
                <th scope="col">Nombre Usuario</th>
                <th scope="col">Dni</th>
                <th scope="col">Nombre hospital</th>
                <th scope="col">Nombre medico</th>
                <th scope="col">Servicio</th>
                <th scope="col">Fecha Registro</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php require '../config/db.php'; $medicohospitalservicio = $conexion->query('SELECT * FROM v_admisiones');?>
            <?php while($medicohospitalservi = $medicohospitalservicio->fetchObject()): ?>
                <tr>
                    <td><?= $medicohospitalservi->nombre . ' ' . $medicohospitalservi->apellido ?></td>
                    <td><?= $medicohospitalservi->dni ?></td>
                    <td><?= $medicohospitalservi->NombreHospital ?></td>
                    <td><?= $medicohospitalservi->ApellidoMedico. ' ' . $medicohospitalservi->NombreMedico ?></td>
                    <td><?= $medicohospitalservi->Servicio?></td>
                    <td><?= $medicohospitalservi->fecha_admision ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="../medicohospitalservicio/eliminarmedicohospitalservicio.php?codmedicohospitalservicio=<?= $medicohospitalservi->cod_medicos_hospitales_servicios?>" onclick="return confirm('estas seguro?');" class="btn btn-outline-danger">Eliminar</a>
                            <a href="../medicohospitalservicio/actualizarmedicohospitalservicio.php?codmedicohospitalservicio=<?=$medicohospitalservi->cod_medicos_hospitales_servicios?>" class="btn btn-outline-warning">Actualizar</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once '../layout/footer.php' ?>
