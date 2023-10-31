<?php
require_once '../helper/autocargar.php';
$db = new DB();
$db->abreConexion();
$conexion = $db->getConexion();

class Login
{
    private $repository;
    private $conexion;

    private $usuarioLogueado = false;

    public function __construct($repository, $conexion)
    {
        $this->repository = $repository;
        $this->conexion = $conexion;
    }

    public function Identifica( $usuario,  $contrasena)
    {
        if ($this->ExisteUsuario($usuario, $contrasena)) {
            $this->usuarioLogueado = true;
            echo "Inicio de sesión exitoso para $usuario.";
        } else {
            echo "Error: Usuario o contraseña incorrectos.";
        }
    }

    private function ExisteUsuario($usuario, $contrasena) {
        // Aquí asumimos que $arrayDeUser contiene objetos User
        foreach ($arrayDeUser as $user) {
            if ($user->nombre === $usuario && $user->contrasena === $contrasena) {
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

$repository = new BDRepository();
$login = new Login($repository, $conexion);

?>