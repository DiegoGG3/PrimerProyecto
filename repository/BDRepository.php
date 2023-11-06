<?php

    class BDRepository {
        public static function selectUniversal($conexion, $tabla) {
            $resultado = $conexion->query('SELECT * FROM ' . $tabla . ";", MYSQLI_USE_RESULT);
            $objetos = array();
            while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
                array_push($objetos, $registro);
            }
    
            switch ($tabla) {
                case "User":
                    return userRep::arrayUser($objetos);
                    break;
                
            }
        }

        public static function devolverUsuario($conexion,$nombre,$contraseña){
            $sql= "SELECT * from user where password=:password and nombre=:nombre;";
            $statement=$conexion->prepare($sql);
            $statement->bindParam(":nombre",$nombre);
            $statement->bindParam(":password",$contraseña);
            $statement->execute();

            while($registro = $statement->fetch(PDO::FETCH_OBJ)){
                return userRep::crearUsuario($registro->ID,$registro->nombre,$registro->password,$registro->rol);
            }
        }
    }
    
?>