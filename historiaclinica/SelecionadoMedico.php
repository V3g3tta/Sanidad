<?php

require_once '../layout/head.php';
require_once '../config/db.php';

if (!empty($_POST['codMedicosHospitalesServicios']) ){

    $codMedicosHospitalesServicios = protege($_POST['codMedicosHospitalesServicios']);
    $query = "SELECT * FROM v_admisiones WHERE cod_medicos_hospitales_servicios = '$codMedicosHospitalesServicios'";
    $HisotiaMedico = $conexion->query($query);

}else{
    $mensaje = [
        'mensaje' => 'Todos los campos son obligatorios',
        'alerta' => 'danger'
    ];
    $_SESSION['mensaje'] = $mensaje;
    header('Location: SelecionadoMedico.php');

}
?>
<?php require_once '../config/accesoTotal.php';?>
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
            <?php while($admision = $HisotiaMedico->fetchObject()): ?>
                <tr>
                    <td><?= $admision->nombre . ' ' . $admision->apellido?></td>
                    <td><?= $admision->dni?></td>
                    <td><?= $admision->NombreHospital?></td>
                    <td><?= $admision->ApellidoMedico. ' ' . $admision->NombreMedico?></td>
                    <td><?= $admision->Servicio?></td>
                    <td><?= $admision->fecha_admision?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="../historiaclinica/historiaClinica.php?codAdmision=<?=$admision->cod_admision?>" class="btn bi bi-activity btn-outline-success">Atender</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once '../layout/footer.php' ?>


