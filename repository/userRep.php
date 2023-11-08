<?php
    class userRep{
        public static function crearUsuario($id,$nombre,$contraseña,$rol){
            $usuario=new User($id,$nombre,$contraseña,$rol);
            return $usuario;
        }

        public static function arrayUser($objetos) {
            $arrayUsu= array();
            foreach($objetos as $array){
                array_push($arrayUsu,userRep::crearUsuario($array->ID,$array->nombre,$array->password,$array->rol));
            }
            return $arrayUsu;
        }

        public static function añadirUsuario($conexion,$usuario){
            $preparedConexion=$conexion->prepare("INSERT INTO User(Nombre,Password,Role)
            VALUES (:nombre,:password,:role)");
    
            $nombre=$usuario->get_nombre();
            $password=$usuario->get_password();
            $role=$usuario->get_role();
    
            $preparedConexion->bindParam(':nombre',$nombre);
            $preparedConexion->bindParam(':password',$password);
            $preparedConexion->bindParam(':role',$role);
    
            $preparedConexion->execute();
        }

        public static function borrarUsuario($conexion, $usuario){
            $preparedConexion = $conexion->prepare("DELETE FROM User WHERE Nombre = :nombre AND Password = :password");
        
            $nombre = $usuario->get_nombre();
            $password = $usuario->get_password();
        
            $preparedConexion->bindParam(':nombre', $nombre);
            $preparedConexion->bindParam(':password', $password);
        
            $preparedConexion->execute();
        }

        public static function modificarNombre($conexion, $usuario, $nuevoNombre){
            $preparedConexion = $conexion->prepare("UPDATE User SET Nombre = :nuevoNombre WHERE Nombre = :nombre AND Password = :password");
        
            $nombre = $usuario->get_nombre();
            $password = $usuario->get_password();
        
            $preparedConexion->bindParam(':nombre', $nombre);
            $preparedConexion->bindParam(':password', $password);
            $preparedConexion->bindParam(':nuevoNombre', $nuevoNombre);
        
            $preparedConexion->execute();
        }
        
        public static function modificarPassword($conexion, $usuario, $nuevoPassword){
            $preparedConexion = $conexion->prepare("UPDATE User SET Password = :nuevoPassword WHERE Nombre = :nombre AND Password = :password");
        
            $nombre = $usuario->get_nombre();
            $password = $usuario->get_password();
        
            $preparedConexion->bindParam(':nombre', $nombre);
            $preparedConexion->bindParam(':password', $password);
            $preparedConexion->bindParam(':nuevoPassword', $nuevoPassword);
        
            $preparedConexion->execute();
        }
        
        public static function modificarRol($conexion, $usuario, $nuevoRol){
            $preparedConexion = $conexion->prepare("UPDATE User SET Role = :nuevoRol WHERE Nombre = :nombre AND Password = :password");
        
            $nombre = $usuario->get_nombre();
            $password = $usuario->get_password();
        
            $preparedConexion->bindParam(':nombre', $nombre);
            $preparedConexion->bindParam(':password', $password);
            $preparedConexion->bindParam(':nuevoRol', $nuevoRol);
        
            $preparedConexion->execute();
        }
        
        
        
    }
?>