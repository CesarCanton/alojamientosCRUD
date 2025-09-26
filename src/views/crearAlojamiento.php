<?php
require_once __DIR__ . '/../controllers/AlojamientoController.php';
session_start();

if(isset($_POST['nombre'], $_POST['ubicacion'], $_POST['descripcion'])){
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $descripcion = $_POST['descripcion'];
    AlojamientoController::crearAlojamiento($nombre, $ubicacion, $descripcion);
    header('Location: admin.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Crear alojamiento</title>
</head>

<body>
    <main class="container">
        <!-- contenedor para crear alojamiento -->
        <div class="align-items-center" style="height: 100vh; margin-top: 10rem;">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <h2 class="text-center mb-4">Crear Alojamiento</h2>
                    <form action="crearAlojamiento.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Ubicacion</label>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Descripcion</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" style="height: 100px"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Guardar</button>
                    </form>
                </div>
            </div>


    </main>



</body>