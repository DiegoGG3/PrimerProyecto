<?php
    class userRep{
        public static function crearUsuario($id,$nombre,$password,$role){
            $usuario=new User($id,$nombre,$password,$role);
            return $usuario;
        }

        public static function arrayUser($objetos) {
            $arrayUsu= array();
            foreach($objetos as $array){
                array_push($arrayUsu,userRep::crearUsuario($array->ID,$array->nombre,$array->password,$array->rol));
            }
            return $arrayUsu;
        }
    }
?>