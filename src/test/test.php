<?php

require_once '../models/UsuarioModel.php';
// require_once'../../config/config.php';
require_once '../models/AlojamientoModel.php';
require_once '../models/RegistroAlojamientoModel.php';


$usuarios = UsuarioModel::getUsuarios();

foreach ($usuarios as $usuario) {
    echo "ID: {$usuario->id}, Nombre: {$usuario->nombre}, Email: {$usuario->email}, Rol: {$usuario->role}<br>";
}
echo "<br><br>";
echo "Alojamientos:<br>";
$alojamientos = AlojamientoModel::getAlojamientos();
foreach ($alojamientos as $alojamiento) {
    echo "ID: {$alojamiento->id}, Nombre: {$alojamiento->nombre}, Ubicación: {$alojamiento->ubicacion}, Descripción: {$alojamiento->descripcion}<br>";
}

echo "<br><br>";
echo "Registros de Alojamiento:<br>";
$registros = RegistroAlojamientoModel::getRegistros();
foreach ($registros as $registro) {
    echo "ID Registro: {$registro->id}, ID Usuario: {$registro->idUsuario}, ID Alojamiento: {$registro->idAlojamiento}, Fecha: {$registro->fecha}<br>";
}
