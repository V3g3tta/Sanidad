<?php require_once 'layout/head.php';?>

<div class="container mt-4">
    <div class="row">
        <div class="card col-md-4">
            <div class="card-body">
                <h5 class="card-title">Asignar Usuario</h5>
                <h6 class="card-subtitle mb-2 text-muted">Modulo</h6>
                <p class="card-text">Modulo diseñado para crear usuarios.</p>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones Medicos
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="usuario/usuario.php" class="dropdown-item">Crear Medico</a></li>
                        <li><a href="usuario/listaUsuario.php." class="dropdown-item">Listar Medico</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card col-md-4">
            <div class="card-body">
                <h5 class="card-title">Asignar Camas</h5>
                <h6 class="card-subtitle mb-2 text-muted">Modulo</h6>
                <p class="card-text">Modulo diseñado para crear camas.</p>
                <a href="cama.php" class="card-link">Crear cama</a>
            </div>
        </div>
        <div class="card col-md-4">
            <div class="card-body">
                <h5 class="card-title">Asignar Hospital</h5>
                <h6 class="card-subtitle mb-2 text-muted">Modulo</h6>
                <p class="card-text">Modulo diseñado para crear hospitales.</p>
                <a href="hospital.php" class="card-link">Crear Hospital</a>
            </div>
        </div>
        <div class="card col-md-4">
           <div class="card-body">
               <h5 class="card-title">Asignar Servicio</h5>
               <h6 class="card-subtitle mb-2 text-muted">Modulo</h6>
               <p class="card-text">Modulo diseñado para crear servicio.</p>
               <a href="servicio.php" class="card-link">Crear Servicio</a>
          </div>
          </div>
          <div class="card col-md-4">
            <div class="card-body">
                <h5 class="card-title">Asignar Medico</h5>
                <h6 class="card-subtitle mb-2 text-muted">Modulo</h6>
                <p class="card-text">Modulo diseñado para gestionar a los medico.</p>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones Medicos
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="medico/medico.php" class="dropdown-item">Crear Medico</a></li>
                        <li><a href="medico/listaMedico.php" class="dropdown-item">Listar Medico</a></li>
                    </ul>
                </div>       
            </div>
        </div>
    </div>
</div>

<?php require_once 'layout/footer.php' ?>