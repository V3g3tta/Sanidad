<?php session_start() ?>

<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta meta name="viewport" content="width=device-width, user-scalable=no" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Sanidad</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-success">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="/">Sanidad</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active  text-white" aria-current="page" href="index.php"">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="usuario/usuario.php">Crear Usuairo</a></li>
                        <li><a class="dropdown-item" href="cama/cama.php">Crear Cama</a></li>
                        <li><a class="dropdown-item" href="hospital/hopital.php">Crear Hospital</a></li>
                        <li><a class="dropdown-item" href="servicio/servicio.php">Crear Servicio</a></li>
                        <li><a class="dropdown-item" href="medico/medico.php">Crear Medico</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>