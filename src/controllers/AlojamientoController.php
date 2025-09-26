<?php
require_once __DIR__ . '/../models/AlojamientoModel.php';
class AlojamientoController
{
    public static function getAllAlojamientos()
    {
        return AlojamientoModel::getAlojamientos();
    }

    public static function getAlojamientoById($id)
    {
        return AlojamientoModel::findById($id);
    }

    public static function crearAlojamiento($nombre, $descripcion, $ubicacion)
    {
        $alojamiento = new AlojamientoModel($nombre, $descripcion, $ubicacion);
        return $alojamiento->save();
    }

    public static function actualizarAlojamiento($id, $nombre, $descripcion, $ubicacion)
    {
        $alojamiento = AlojamientoModel::findById($id);
        if ($alojamiento) {
            $alojamiento->nombre = $nombre;
            $alojamiento->descripcion = $descripcion;
            $alojamiento->ubicacion = $ubicacion;
            
            return $alojamiento->update();
        }
        return false;
    }

    public static function eliminarAlojamiento($id)
    {
        $alojamiento = AlojamientoModel::findById($id);
        if ($alojamiento) {
            return $alojamiento->delete();
        }
        return false;
    }
}