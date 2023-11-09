<?php
    class userPendientesRepository{
        public static function crearUsuario($IdPendiente,$nombre,$contraseña){
            $usuario=new UserPendiente($IdPendiente,$nombre,$contraseña);
            return $usuario;
        }

        public static function arrayPendientes($objetos) {
            $arrayUsu= array();
            foreach($objetos as $array){
                array_push($arrayUsu,userPendientesRepository::crearUsuario($array->IdPendiente,$array->Nombre,$array->Contraseña));
            }
            return $arrayUsu;
        }

        public static function añadirUsuario($conexion,$usuario){
            $preparedConexion=$conexion->prepare("INSERT INTO userNoLog(Nombre,contraseña)
            VALUES (:nombre,:contraseña)");
    
            $nombre=$usuario->get_nombre();
            $contraseña=$usuario->get_contraseña();
    
            $preparedConexion->bindParam(':nombre',$nombre);
            $preparedConexion->bindParam(':contraseña',$contraseña);
    
            $preparedConexion->execute();
        }

        public static function borrarUsuario($conexion, $usuario){
            $preparedConexion = $conexion->prepare("DELETE FROM User WHERE Nombre = :nombre AND contraseña = :contraseña");
        
            $nombre = $usuario->get_nombre();
            $contraseña = $usuario->get_contraseña();
        
            $preparedConexion->bindParam(':nombre', $nombre);
            $preparedConexion->bindParam(':contraseña', $contraseña);
        
            $preparedConexion->execute();
        }
        
        
    }
?>