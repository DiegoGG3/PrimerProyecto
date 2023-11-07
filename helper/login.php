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
        if ($this->ExisteUsuario($usuario, $contrasena)==null) {
            echo "Error: Usuario o contraseña incorrectos.";

            
        } else {
            $this->usuarioLogueado = true;

            var_dump($this->get_rol());
        }
    }

    private function ExisteUsuario($usuario, $contrasena) {
        foreach ($this->arrayDeUser as $user) {
            if ($user->get_Nombre() === $usuario && $user->get_Contraseña() === $contrasena) {
                return $user;
            }
        }
        return null;
    }
    
    

    public function UsuarioEstaLogueado()
    {
        return $this->usuarioLogueado;
    }
}

?>