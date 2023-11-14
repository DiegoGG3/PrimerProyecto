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
                case "userPendiente":
                    return userPendientesRepository::arrayPendientes($objetos);
                    break;
                case "Pregunta":
                    return preguntaRepository::arrayPregunta($objetos);
                    break;
                case "Examen":
                    return examenRepository::arrayExamen($objetos);
                    break;
                
            }
        }

        public static function devolverUsuario($conexion,$nombre,$contraseña){
            $sql= "SELECT * from user where contraseña=:contraseña and nombre=:nombre;";
            $statement=$conexion->prepare($sql);
            $statement->bindParam(":nombre",$nombre);
            $statement->bindParam(":contraseña",$contraseña);
            $statement->execute();

            while($registro = $statement->fetch(PDO::FETCH_OBJ)){
                return userRep::crearUsuario($registro->IDuser,$registro->nombre,$registro->password,$registro->rol);
            }
        }

        public static function devolverExamen($conexion){
            $sql= "SELECT * FROM Examen WHERE ID = (SELECT MAX(ID) FROM Examen);";
            $statement=$conexion->prepare($sql);
            $statement->execute();

            while($registro = $statement->fetch(PDO::FETCH_OBJ)){
                return examenRepository::crearExamen($registro->ID,$registro->fecha_inicio,$registro->id_creador);
            }
        }
    }
    
?>