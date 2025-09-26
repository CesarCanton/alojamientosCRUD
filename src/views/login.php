<?php
require '../controllers/UsuarioController.php';

if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    UsuarioController::login($email, $password);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <main class="container">
        <!-- contenedor del login -->
        <div class="align-items-center" style="height: 100vh; margin-top: 10rem;">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <h2 class="text-center mb-4">Login</h2>
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Correo electronico</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <div class="text-center mt-3">
                        <a class="btn" href="crearCuenta.php">¿No tienes cuenta?</a>
                    </div>
                </div>
            </div>
    </main>
</body>

</html>