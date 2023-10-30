<?php
    class databaseRep{    
        function 

        function selectUniversal($conexion,$tabla){
            $resultado = $conexion->query('SELECT * FROM '.$tabla.";", MYSQLI_USE_RESULT);
            $objetos=array();
            while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
                array_push($objetos,$registro);
            }  

            switch ($tabla) {
                case "User":
                    return arrayUser($objetos);
                    break;
                case "Pregunta":
                    return arrayPregunta($objetos);
                    break;
            }
        }
    }
?>