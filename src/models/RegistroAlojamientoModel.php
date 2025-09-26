<?php
require_once __DIR__ . '/../../config/config.php';
require_once '../models/AlojamientoModel.php';
require_once '../models/UsuarioModel.php';

class RegistroAlojamientoModel
{
    public $id;
    public $idUsuario;
    public $idAlojamiento;
    public $fecha;
    function __construct($idUsuario, $idAlojamiento, $fecha)
    {
        $this->idUsuario = $idUsuario;
        $this->idAlojamiento = $idAlojamiento;
        $this->fecha = $fecha;
    }

    public static function getRegistros()
    {
        $pdo = Connection::getInstance()->getConnection();
        $query = $pdo->query("SELECT registroAlojamiento.id,
        alojamiento.id as idAlojamiento,
        usuario.id as idUsuario,
        registroAlojamiento.fecha FROM registroAlojamiento 
        JOIN usuario ON registroAlojamiento.idUsuario=usuario.id
        JOIN alojamiento on registroAlojamiento.idAlojamiento = alojamiento.id
");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function save()
    {
        $pdo = Connection::getInstance()->getConnection();
        $stmt = $pdo->prepare("INSERT INTO registroAlojamiento (idUsuario, idAlojamiento, fecha) VALUES (:idUsuario, :idAlojamiento, :fecha)");
        $stmt->bindParam(':idUsuario', $this->idUsuario);
        $stmt->bindParam(':idAlojamiento', $this->idAlojamiento);
        $stmt->bindParam(':fecha', $this->fecha);
        return $stmt->execute();
    }

    public static function delete($id)
    {
        $pdo = Connection::getInstance()->getConnection();
        $stmt = $pdo->prepare("DELETE FROM registroAlojamiento WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public static function getRegistrosByUsuario($idUsuario)
    {
        $pdo = Connection::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM registroAlojamiento WHERE idUsuario = :idUsuario");
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAlojamiento()
    {
        return AlojamientoModel::findById($this->idAlojamiento);
    }
    public function getUsuario()
    {
        return UsuarioModel::findById($this->idUsuario);
    }
}
