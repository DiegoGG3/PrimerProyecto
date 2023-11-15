<?php
    class preguntaRepository{
        public static function crearPregunta($id_pregunta,$enunciado,$respuestas,$categoria,$dificultad,$recurso){
            $pregunta=new pregunta($id_pregunta,$enunciado,$respuestas,$categoria,$dificultad,$recurso);
            return $pregunta;
        }

        public static function arrayPregunta($objetos) {
            $arrayPreg= array();
            foreach($objetos as $array){
                array_push($arrayPreg,preguntaRepository::crearPregunta($array->ID_pregunta,$array->Enunciado,$array->respuestas,$array->categoria,$array->dificultad,$array->URL));
            }
            return $arrayPreg;
        }

        public static function añadirPregunta($conexion,$pregunta){
            $preparedConexion=$conexion->prepare("INSERT INTO pregunta(Enunciado, Respuestas, Categoria, Dificultad, Tipo_recurso, url)
            VALUES (:Enunciado,:Respuestas,:Categoria,:Dificultad,'','')");
    
            $Enunciado=$pregunta->getEnunciado();
            $Respuestas=$pregunta->getRespuestasJSON();
            $Categoria=$pregunta->getCategoria();
            $Dificultad=$pregunta->getDificultad();

            
    
            $preparedConexion->bindParam(':Enunciado',$Enunciado);
            $preparedConexion->bindParam(':Respuestas',$Respuestas);
            $preparedConexion->bindParam(':Categoria',$Categoria);
            $preparedConexion->bindParam(':Dificultad',$Dificultad);

            $preparedConexion->execute();
        }
    }
?>