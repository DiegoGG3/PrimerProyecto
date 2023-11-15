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

        public static function devolverUsuarioRol($conexion,$rol){
            $sql= "SELECT * from User where rol='" . $rol ."';";
            $statement=$conexion->prepare($sql);
            $statement->execute();
            $listaUsuarios= array();
            while($registro = $statement->fetch(PDO::FETCH_OBJ)){
                $usuario= userRep::crearUsuario($registro->IDuser,$registro->nombre,$registro->contraseña,$registro->rol);
                array_push($listaUsuarios,$usuario);
            }
            return $listaUsuarios;
        }

        public static function añadirUsuario($conexion,$usuario){
            $preparedConexion=$conexion->prepare("INSERT INTO User(IDuser, nombre,contraseña,rol)
            VALUES ('', :nombre,:contrasena,:rol)");
    
            $nombre=$usuario->get_nombre();
            $contraseña=$usuario->get_contraseña();
            $rol=$usuario->get_rol();
            
    
            $preparedConexion->bindParam(':nombre',$nombre);
            $preparedConexion->bindParam(':contrasena',$contraseña);
            $preparedConexion->bindParam(':rol',$rol);
            $preparedConexion->execute();
        }

        public static function borrarUsuario($conexion, $id){
            $preparedConexion = $conexion->prepare("DELETE FROM User WHERE IDuser = :IDuser");
    
        
            $preparedConexion->bindParam(':IDuser', $id);
        
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