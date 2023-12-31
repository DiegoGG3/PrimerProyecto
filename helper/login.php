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
        $user=$this->ExisteUsuario($usuario, $contrasena);
        if ($user==null) {
            echo "Error: Usuario o contraseña incorrectos.";

            
        } else {
            $this->usuarioLogueado = true;

            loginRepository::login($user);
            header("location: ./index.php");

        }
    }
      

    public function ExisteUsuario($usuario, $contrasena) {
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