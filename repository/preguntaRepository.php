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


    }
?>