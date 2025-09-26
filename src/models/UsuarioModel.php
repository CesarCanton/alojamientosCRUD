<?php
// require_once __DIR__. '../../config/config.php';
require_once __DIR__ . '/../../config/config.php';


class UsuarioModel
{
    public $id_usuario;
    public $nombre;
    public $email;
    public $contra;
    public $id_role;

    function __construct($nombre, $email, $contra, $id_role)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->contra = $contra;
        $this->id_role = $id_role;
    }
    public static function getUsuarios()
    {
        $pdo = Connection::getInstance()->getConnection();
        $query = $pdo->query("SELECT usuario.id, usuario.nombre,usuario.email, usuario.contra, roles.role as role FROM usuario INNER JOIN roles ON usuario.idRole=roles.id)");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function save()
    {
        $pdo = Connection::getInstance()->getConnection();
        $stmt = $pdo->prepare("INSERT INTO usuario (nombre, email, contra, idRole) VALUES (:nombre, :email, :contra, :idRole)");
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':contra', $this->contra);
        $stmt->bindParam(':idRole', $this->id_role);
        return $stmt->execute();
    }

    public static function findByEmailAndPassword($email, $password)
    {
        $pdo = Connection::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = :email AND contra = :contra");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contra', $password);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
public static function findById($id)
    {
        $pdo = Connection::getInstance()->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject();
    }

}
