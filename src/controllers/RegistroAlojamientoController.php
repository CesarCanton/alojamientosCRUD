<?php
require_once __DIR__ . '/../models/RegistroAlojamientoModel.php';
class RegistroAlojamientoController{
public static function getAllRegistros()
    {
        return RegistroAlojamientoModel::getRegistros();
    }

    public static function crearRegistro($idUsuario, $idAlojamiento, $fecha)
    {
        $registro = new RegistroAlojamientoModel($idUsuario, $idAlojamiento, $fecha);
        return $registro->save();
    }

    public static function eliminarRegistro($id)
    {
        return RegistroAlojamientoModel::delete($id);
    }
    public static function getRegistrosByUsuario($idUsuario)
    {
        return RegistroAlojamientoModel::getRegistrosByUsuario($idUsuario);
    }
   
}