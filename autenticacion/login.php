<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap v5.1.3 CDNs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CSS File -->
    <link rel="stylesheet" href="../layout/css/stilo.css">

</head>

<body>

<div class="login">

    <h1 class="text-center">Bienvenido!</h1>
    <?php require_once '../layout/message.php' ?>
    <form class="needs-validation" method="post" action="checkLogin.php">
        <div class="form-group">
            <label class="form-label" for="email">Correo</label>
            <input class="form-control" type="email" name="correo" id="email" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="clave">Clave</label>
            <input class="form-control" type="password" name="clave" id="clave" required>
        </div>
        <button class="btn btn-dark w-100" type="submit">Iniciar Sesión</button>
    </form>

</div>

</body>

</html>