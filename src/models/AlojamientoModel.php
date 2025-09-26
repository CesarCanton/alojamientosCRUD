<?php
require_once __DIR__ . '/../../config/config.php';

class AlojamientoModel
{
    public $id;
    public $nombre;
    public $ubicacion;
    public $descripcion;

    function __construct($nombre, $ubicacion, $descripcion)
    {
        $this->nombre = $nombre;
        $this->ubicacion = $ubicacion;
        $this->descripcion = $descripcion;
    }
    public static function getAlojamientos()
    {
        $pdo = Connection::getInstance()->getConnection();
        $query = $pdo->query("SELECT alojamiento.id, alojamiento.nombre, alojamiento.ubicacion, alojamiento.descripcion FROM alojamiento");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function save()
    {
        $pdo = Connection::getInstance()->getConnection();
        $stmt = $pdo->prepare("INSERT INTO alojamiento (nombre, ubicacion, descripcion) VALUES (:nombre, :ubicacion, :descripcion)");
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':ubicacion', $this->ubicacion);
        $stmt->bindParam(':descripcion', $this->descripcion);
        return $stmt->execute();
    }

    public static function findById($id)
    {
        $pdo = Connection::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM alojamiento WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject();
    }
}
