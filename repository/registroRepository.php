<?php
    class registroRepository{
        public static function registroPendiente ($conexion, $nombre, $contraseña){
            $usuario=userPendientesRepository::crearUsuario(null, $nombre, $contraseña);
            echo $usuario->get_Nombre();
            userPendientesRepository::añadirUsuario($conexion, $usuario);
        }
    }
?>