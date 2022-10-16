<?php require_once 'layout/head.php';?>

<div class="container mt-4">
    <div class="row">
        <div class="card col-md-4">
            <div class="card-body">
                <svg xmlns="usuario\person-circle.svg" width="40" height="60" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
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
                <svg xmlns="cama\prescription2.svg" width="40" height="60" fill="currentColor" class="bi bi-prescription2" viewBox="0 0 16 16">
                    <path d="M7 6h2v2h2v2H9v2H7v-2H5V8h2V6Z"/>
                    <path fill-rule="evenodd" d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v10.5a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 14.5V4a1 1 0 0 1-1-1V1Zm2 3h8v10.5a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5V4ZM3 3V1h10v2H3Z"/>
                </svg>
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
                <svg xmlns="hospital/hospital.svg" width="40" height="60" fill="currentColor" class="bi bi-hospital" viewBox="0 0 16 16">
                    <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z"/>
                    <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z"/>
                </svg>
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
               <svg xmlns="servicio\clipboard-pulse.svg" width="40" height="50" fill="currentColor" class="bi bi-clipboard-pulse" viewBox="0 0 16 16">
                   <path fill-rule="evenodd" d="M10 1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1Zm-5 0A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5v-1Zm-2 0h1v1H3a1 1 0 0 0-1 1V14a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V3.5a1 1 0 0 0-1-1h-1v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2Zm6.979 3.856a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.895-.133L4.232 10H3.5a.5.5 0 0 0 0 1h1a.5.5 0 0 0 .416-.223l1.41-2.115 1.195 3.982a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h1.5a.5.5 0 0 0 0-1h-1.128L9.979 5.356Z"/>
               </svg>
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
                <svg xmlns="medico\heart-pulse.svg" width="40" height="60" fill="currentColor" class="bi bi-heart-pulse" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01L8 2.748ZM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5Zm8.252-6.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162l-1.874-4.686Z"/>
                </svg>
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
    </div>
</div>

<?php require_once 'layout/footer.php' ?>