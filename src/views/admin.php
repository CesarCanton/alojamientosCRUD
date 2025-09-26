<?php
require '../controllers/AlojamientoController.php';
require '../controllers/UsuarioController.php';
session_start();

if (isset($_POST['logout'])) {
    UsuarioController::logout();
}
$alojamientos = AlojamientoController::getAllAlojamientos();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Admin panel</title>
</head>

<body>
    <main class="container">
        <div class="mt-5 justify-content-center">
            <!--Controles del admin-->
            <div class="row">
                <form action="" method="post" class="d-flex flex-row-reverse justify-content-between">
                    <button class="btn btn-primary"><a href="crearAlojamiento.php" style="color: white; text-decoration: none;">Crear Alojamiento</a></button>
                    <button type="submit" name="logout" class="btn btn-danger">Cerrar Sesión</button>
                </form>
            </div>
            <!-- Alojamientos existentes -->
            <h2 class="text-center mt-2">Alojamientos existentes</h2>
            <div class="row mt-4">
                <?php foreach ($alojamientos as $alojamiento): ?>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($alojamiento->nombre) ?></h5>
                                <p class="card-text"><b>Descripcion:</b> <?= htmlspecialchars($alojamiento->descripcion)
                                                                            ?><b><br>Ubicacion:</b> <?= htmlspecialchars($alojamiento->ubicacion) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>


    </main>



</body>




</html>