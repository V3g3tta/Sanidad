<?php require_once '../config/accesoLogin.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Bootstrap v5.1.3 CDNs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CSS File -->
    <link rel="stylesheet" href="../layout/css/stilo.css">

</head>

<body>

<div class="login">
    <h1 class="text-center">RED SANITARIA</h1>
    <svg xmlns="http://www.w3.org/2000/svg" width="300" height="100" fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16" style=" color: red;" >
        <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z"/>
    </svg>
    <h2 class="text-center">Iniciar sesión</h2>
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