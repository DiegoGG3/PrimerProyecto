<?php

    class dificultadRepository{

        public static function crearDificultad($id_dificultad,$nombre){
            $dificultad=new dificultad($id_dificultad,$nombre);
            return $dificultad;
        }

        public static function arrayDificultad($objetos) {
            $arraydificultad= array();
            foreach($objetos as $array){
                array_push($arraydificultad,dificultadRepository::crearDificultad($array->ID_dificultad,$array->Nombre));
            }
            return $arraydificultad;
        }
    }
?>