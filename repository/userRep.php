<?php
    class userRep{
        public static function crearUsuario($IDuser,$nombre,$contraseña,$rol){
            $usuario=new User($IDuser,$nombre,$contraseña,$rol);
            return $usuario;
        }

        public static function arrayUser($objetos) {
            $arrayUsu= array();
            foreach($objetos as $array){
                array_push($arrayUsu,userRep::crearUsuario($array->IDuser,$array->nombre,$array->contraseña,$array->rol));
            }
            return $arrayUsu;
        }

        public static function añadirUsuario($conexion,$usuario){
            $preparedConexion=$conexion->prepare("INSERT INTO User(Nombre,contraseña,Role)
            VALUES (:nombre,:contraseña,:role)");
    
            $nombre=$usuario->get_nombre();
            $contraseña=$usuario->get_contraseña();
            $role=$usuario->get_role();
    
            $preparedConexion->bindParam(':nombre',$nombre);
            $preparedConexion->bindParam(':contraseña',$contraseña);
            $preparedConexion->bindParam(':role',$role);
    
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

        public static function modificarNombre($conexion, $usuario, $nuevoNombre){
            $preparedConexion = $conexion->prepare("UPDATE User SET Nombre = :nuevoNombre WHERE Nombre = :nombre AND contraseña = :contraseña");
        
            $nombre = $usuario->get_nombre();
            $contraseña = $usuario->get_contraseña();
        
            $preparedConexion->bindParam(':nombre', $nombre);
            $preparedConexion->bindParam(':contraseña', $contraseña);
            $preparedConexion->bindParam(':nuevoNombre', $nuevoNombre);
        
            $preparedConexion->execute();
        }
        
        public static function modificarcontraseña($conexion, $usuario, $nuevocontraseña){
            $preparedConexion = $conexion->prepare("UPDATE User SET contraseña = :nuevocontraseña WHERE Nombre = :nombre AND contraseña = :contraseña");
        
            $nombre = $usuario->get_nombre();
            $contraseña = $usuario->get_contraseña();
        
            $preparedConexion->bindParam(':nombre', $nombre);
            $preparedConexion->bindParam(':contraseña', $contraseña);
            $preparedConexion->bindParam(':nuevocontraseña', $nuevocontraseña);
        
            $preparedConexion->execute();
        }
        
        public static function modificarRol($conexion, $usuario, $nuevoRol){
            $preparedConexion = $conexion->prepare("UPDATE User SET Role = :nuevoRol WHERE Nombre = :nombre AND contraseña = :contraseña");
        
            $nombre = $usuario->get_nombre();
            $contraseña = $usuario->get_contraseña();
        
            $preparedConexion->bindParam(':nombre', $nombre);
            $preparedConexion->bindParam(':contraseña', $contraseña);
            $preparedConexion->bindParam(':nuevoRol', $nuevoRol);
        
            $preparedConexion->execute();
        }
        
        
        
    }
?>