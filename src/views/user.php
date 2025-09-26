<?php
require '../controllers/UsuarioController.php';
require '../controllers/AlojamientoController.php';
require '../controllers/RegistroAlojamientoController.php';
session_start();

if (isset($_POST['logout'])) {
    UsuarioController::logout();
}
// Obtener alojamientos disponibles
$alojamientos = AlojamientoController::getAllAlojamientos();
// $alojamientosReservados = RegistroAlojamientoController::getAllRegistros();
$idUsuario = $_SESSION['id'];
$alojamientosReservados = RegistroAlojamientoController::getRegistrosByUsuario($idUsuario);
if (isset($_POST['reservar'])) {
    $idAlojamiento = $_POST['reservar'];
    $idUsuario = $_SESSION['id'];
    $fecha = date('Y-m-d'); // Fecha actual
    RegistroAlojamientoController::crearRegistro($idUsuario, $idAlojamiento, $fecha);
    // Redirigir para evitar reenvío del formulario
    header("Location: user.php");
    exit();
}

if (isset($_POST['cancelar'])) {
    $idRegistro = $_POST['cancelar'];
    RegistroAlojamientoController::eliminarRegistro($idRegistro);
    // Redirigir para evitar reenvío del formulario
    header("Location: user.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Alojamientos</title>
</head>

<body>
    <main class="container">
        <div class="mt-5 justify-content-center">
            <!--Controles del usuario-->
            <div class="row">
                <form action="" method="post">
                    <button type="submit" name="logout" class="btn btn-danger ">Cerrar Sesión</button>
                </form>
                <!-- <div class="col d-flex flex-row-reverse">
                    <a href="" class="btn btn-primary">Crear reservacion</a>
                </div> -->
            </div>


            <h2 class="text-center mt-2">Alojamientos Disponibles</h2>
            <div class="row mt-4">
                <?php foreach ($alojamientos as $alojamiento): ?>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($alojamiento->nombre) ?></h5>
                                <p class="card-text"><b>Descripcion: </b><?= htmlspecialchars($alojamiento->descripcion) ?></p>
                                <form action="" method="post">
                                    <button type="submit" name="reservar" value="<?= $alojamiento->id ?>" class="btn btn-primary">Reservar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <h2 class="text-center mt-2">Alojamientos Reservados</h2>
            <div class="row mt-4">
                <?php foreach ($alojamientosReservados as $registro): ?>
                    <?php $alojamiento = AlojamientoController::getAlojamientoById($registro->idAlojamiento); ?>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><b>Alojamiento: </b> <?= htmlspecialchars($alojamiento->nombre) ?></h5>
                                <p class="card-text"><br><b>Descripcion: </b> <?= htmlspecialchars($alojamiento->descripcion)?> 
                                <br><b>Fecha:</b> <?= htmlspecialchars($registro->fecha) ?></p>
                                <form action="" method="post">
                                    <button type="submit" name="cancelar" value="<?= $registro->id ?>" class="btn btn-danger">Cancelar Reserva</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</body>




</html>