<!DOCTYPE html>
<html lang="en">

<head>

    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap v5.1.3 CDNs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CSS File -->
    <link rel="stylesheet" href="stilo.css">

</head>

<body>

<div class="login">

    <h1 class="text-center">Bienvenido!</h1>

    <form class="needs-validation">
        <div class="form-group">
            <label class="form-label" for="email">Correo</label>
            <input class="form-control" type="email" name="correo" id="email" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="clave">Clave</label>
            <input class="form-control" type="password" name="clave" id="clave" required>
        </div>
        <button class="btn btn-success w-100" type="submit">Iniciar Sesión</button>
    </form>

</div>

</body>

</html>