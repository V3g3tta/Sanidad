<?php require_once 'layout/head.php';?>

<div class="container mt-4">
    <div class="row">
        <div class="card col-md-4">
            <div class="card-body">
                <i class="bi bi-person-circle" style="font-size: 60px; color: red;" ></i>
                <h5 class="card-title">Usuarios</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text">Modulo diseñado para gestionar a los usuarios.</p>
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones Medicos
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="usuario/usuario.php" class="dropdown-item">Crear Usuario</a></li>
                        <li><a href="usuario/listaUsuario.php." class="dropdown-item">Listar Usuario</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card col-md-4">
            <div class="card-body">
                <i class="bi bi-segmented-nav" style="font-size: 60px; color: red;" ></i>
                <h5 class="card-title">Camas</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text">Modulo diseñado para gestionar las camas</p>
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <i  class="bi bi-hospital" style="font-size: 60px; color: red;" ></i>
                <h5 class="card-title">Hospitales</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text">Modulo diseñado para gestionar a los hospitales.</p>
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones Hospital
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="hospital/hospital.php" class="dropdown-item">Crear Hospital</a></li>
                        <li><a href="hospital/listaHospital.php" class="dropdown-item">Listar Hospital</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card col-md-4">
           <div class="card-body">
               <span style="font-size: 60px; color: red;"><i class="bi bi-clipboard-pulse"></i></span>
               <h5 class="card-title">Servicios</h5>
               <h6 class="card-subtitle mb-2 text-muted"></h6>
               <p class="card-text">Modulo diseñado para gestionar a los servicio.</p>
               <div class="dropdown">
                   <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Opciones Sevicio
                   </button>
                   <ul class="dropdown-menu">
                       <li><a href="servicio/servicio.php" class="dropdown-item">Crear Servicio</a></li>
                       <li><a href="servicio/listaServicio.php." class="dropdown-item">Listar Servicio</a></li>
                   </ul>
               </div>
          </div>
          </div>
        <div class="card col-md-4">
            <div class="card-body">
                <span style="font-size: 60px; color: red;"><i class="bi bi-heart-pulse"></i></span>
                <h5 class="card-title">Medicos</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text">Modulo diseñado para gestionar a los medico.</p>
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones Medicos
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="medico/medico.php" class="dropdown-item">Crear Hospital</a></li>
                        <li><a href="medico/listaMedico.php" class="dropdown-item">Listar Hospital</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card col-md-4">
            <div class="card-body">
                <span style="font-size: 60px; color: red;"><i class="bi bi-file-earmark-medical"></i></span>
                <h5 class="card-title">Asignacion Servicio Cama</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text">Modulo diseñado para gestionar a los Asignacion Servicio Cama.</p>
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones Servicio Cama
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href= "serviciocama/serviciocama.php" class="dropdown-item">Asignar Sercivio Cama</a></li>
                        <li><a href="serviciocama/listaServicioCama.php" class="dropdown-item">Lista Sercivio Cama  </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card col-md-4">
            <div class="card-body">
                <span style="font-size: 60px; color: red;"><i class="bi bi-file-earmark-medical"></i></span>
                <h5 class="card-title">Asignacion Hospital Servicio</h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text">Modulo diseñado para gestionar a los Asignacion Hospital Servicio.</p>
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones Hospital Servicio
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href= "hospitalservicios/hospitalservicio.php" class="dropdown-item">Asignar Hospital Sercivio</a></li>
                        <li><a href="hospitalservicios/listaHospitalServicios.php" class="dropdown-item">Lista Hospital Sercivio  </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card col-md-4">
            <div class="card-body">
                <span style="font-size: 60px; color: red;"><i class="bi bi-file-earmark-medical"></i></span>
                <h5 class="card-title">Asignacion Medico Hospital Servicio </h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text">Modulo diseñado para gestionar a los Asignacion Medico Hospital Servicio.</p>
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones Medico Hospital Servicio
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href= "serviciocama/serviciocama.php" class="dropdown-item">Asignar Medico Hospital Sercivio</a></li>
                        <li><a href="serviciocama/listaServicioCama.php" class="dropdown-item">Lista Medico Hospital Sercivio  </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'layout/footer.php' ?>