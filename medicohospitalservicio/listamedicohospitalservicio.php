<?php require_once '../layout/head.php';?>
    <div class="container mt-3">
        <div class="row justify-content-center aling-items-center">
            <?php require_once '../layout/message.php' ?>
            <table class="table table table-striped">
                <thead>
                <tr>
                    <th scope="col">Nombre servicio</th>
                    <th scope="col">Nombre hospital</th>
                    <th scope="col">Nombre medico</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php require '../config/db.php'; $medicohospitalservicios = $conexion->query('SELECT * FROM v_medico_hospital_servicio');?>
                <?php while($medicohospitalservicio = $medicohospitalservicios->fetchObject()): ?>
                    <tr>
                        <td><?= $medicohospitalservicio->Servicio?></td>
                        <td><?= $medicohospitalservicio->NombreHospital ?></td>
                        <td><?= $medicohospitalservicio->ApellidoMedico . ' ' . $medicohospitalservicio->NombreMedico?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="../medicohospitalservicio/eliminarmedicohospitalservicio.php?codMedicoHospitalServicio=<?= $medicohospitalservicio->cod_medicos_hospitales_servicios?>" onclick="return confirm('estas seguro?');" class="btn btn-outline-danger">Eliminar</a>
                                <a href="../medicohospitalservicio/actualizarmedicohospitalservicio.php?codMedicoHospitalServicio=<?=$medicohospitalservicio->cod_medicos_hospitales_servicios?>" class="btn btn-outline-warning">Actualizar</a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php require_once '../layout/footer.php' ?>