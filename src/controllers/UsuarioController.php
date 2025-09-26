<?php
require_once __DIR__ . '/../models/UsuarioModel.php';
class UsuarioController
{
    //Metodo para logear un usuario
    public static function login($email, $password)
    {
        $user = UsuarioModel::findByEmailAndPassword($email, $password);

        if ($user) {
            $role = $user->idRole;
            $_SESSION['nombre'] = $user->nombre;
            $_SESSION['id'] = $user->id;
            if ($role == 1) {
                //Redirigir a la vista de admin
                header("Location: ../views/admin.php");
            } else {
                //Redirigir a la vista de usuario
                header("Location: ../views/user.php");
            }
        } else {
            //Credenciales incorrectas
            echo "Credenciales incorrectas";
            return false;
        }
    }

    public static function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../views/login.php");
    }

    public static function crearUsuario($nombre, $email, $password, $id_role)
    {
        try{
            $usuario = new UsuarioModel($nombre, $email, $password, $id_role);
            $usuario->save();
            header("Location: ../views/login.php");
        } catch (Exception $e) {
            echo "Error al crear usuario: " . $e->getMessage();
        }

    }
}
