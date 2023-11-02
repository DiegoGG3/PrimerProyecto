<?php
require_once 'autocargar.php';
$db = new DB();
$db->abreConexion();
$conexion = $db->getConexion();

class Login
{
    private $usuarioLogueado = false;

    public function __construct($repository, $conexion)
    {
        $this->repository = $repository;
        $this->conexion = $conexion;
        $this->arrayDeUser = $this->repository->selectUniversal($this->conexion, 'User');
    }

    public function Identifica($usuario, $contrasena)
    {
        if ($this->ExisteUsuario($usuario, $contrasena)) {
            $this->usuarioLogueado = true;
            echo "Inicio de sesión exitoso para $usuario.";
        } else {
            echo "Error: Usuario o contraseña incorrectos.";
        }
    }

    private function ExisteUsuario($usuario, $contrasena) {
        foreach ($this->arrayDeUser as $user) {
            if ($user->get_Nombre() === $usuario && $user->get_Contraseña() === $contrasena) {
                return true;
            }
        }
        return false;
    }
    
    

    public function UsuarioEstaLogueado()
    {
        return $this->usuarioLogueado;
    }
}

?>