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
    }
?>