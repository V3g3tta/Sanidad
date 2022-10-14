<?php require_once 'layout/head.php';?>

<div class="container mt-4">
    <div class="row">
        <div class="card col-md-4">
            <div class="card-body">
                <h5 class="card-title">Usuario</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text">Modulo diseñado para gestionar a los usuarios.</p>
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
                <h5 class="card-title">Camas</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text">Modulo diseñado para gestionar las camas</p>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones Cama
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="cama/cama.php" class="dropdown-item">Crear Cama</a></li>
                        <li><a href="cama/listaCama.php" class="dropdown-item">Listar Cama</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card col-md-4">
            <div class="card-body">
                <h5 class="card-title">Hospital</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text">Modulo diseñado para gestionar a los hospitales.</p>
                <a href="hospital.php" class="card-link">Crear Hospital</a>
            </div>
        </div>
        <div class="card col-md-4">
           <div class="card-body">
               <h5 class="card-title">Servicio</h5>
               <h6 class="card-subtitle mb-2 text-muted"></h6>
               <p class="card-text">Modulo diseñado para gestionar a los servicio.</p>
               <div class="dropdown">
                   <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Opciones Sevicio
                   </button>
                   <ul class="dropdown-menu">
                       <li><a href="servio/servicio.php" class="dropdown-item">Crear Servicio</a></li>
                       <li><a href="servio/listaServicio.php." class="dropdown-item">Listar Servicio</a></li>
                   </ul>
               </div>
          </div>
          </div>
          <div class="card col-md-4">
            <div class="card-body">
                <h5 class="card-title">Medico</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
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