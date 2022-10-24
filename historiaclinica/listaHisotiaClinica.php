<?php require_once '../config/accesoTotal.php';?>
<?php require_once '../layout/head.php';?>
    <div class="container-fluid mt-3">
    <div class="row justify-content-center aling-items-center">
        <?php require_once '../layout/message.php' ?>
        <table class="table table table-striped">
            <thead>
            <tr>
                <th scope="col">Dni Paciente</th>
                <th scope="col">Nombre Paciente</th>
                <th scope="col">Nombre Hospital</th>
                <th scope="col">Nombre Servicio</th>
                <th scope="col">Nombre Medico</th>
                <th scope="col">Fecha Ingresado</th>
                <th scope="col">Fecha Salida</th>
                <th scope="col">Nombre Cama Servicio</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php require '../config/db.php'; $historiaClinicas = $conexion->query('SELECT * FROM v_historia_clinica');?>
            <?php while($historiaClinica = $historiaClinicas->fetchObject()): ?>
                <tr>
                    <td><?= $historiaClinica->dni?></td>
                    <td><?= $historiaClinica->NombreUsuario. ' ' . $historiaClinica->ApellidoUsuario?></td>
                    <td><?= $historiaClinica->NombreHospital?></td>
                    <td><?= $historiaClinica->NombreServicios?></td>
                    <td><?= $historiaClinica->ApellidoMedico .'  '.$historiaClinica->NombreMedico?></td>
                    <td><?= $historiaClinica->fecha_ingreso?></td>
                    <td><?= $historiaClinica->fecha_salida?></td>
                    <td><?= $historiaClinica->nombre_camas. ' ' . $historiaClinica->NombreServicioCama	?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="../historiaclinica/eliminarHistoriaClinica.php?codHistoriaClinica=<?= $historiaClinica->cod_historia_clinica?>" onclick="return confirm('estas seguro?');" class=" btn bi bi-trash3-fill btn-outline-danger">Eliminar</a>
                            <a href="../historiaclinica/actualizarHistoriaClinica.php?codHistoriaClinica=<?=$historiaClinica->cod_historia_clinica?>" class="btn bi bi-arrow-repeat btn-outline-secondary">Actualizar</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once '../layout/footer.php' ?>