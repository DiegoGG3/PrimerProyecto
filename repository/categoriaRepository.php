<?php

    class categoriaRepository{

        public static function crearCategoria($id_categoria,$nombre){
            $categoria=new categoria($id_categoria,$nombre);
            return $categoria;
        }

        public static function arrayCategoria($objetos) {
            $arrayCategoria= array();
            foreach($objetos as $array){
                array_push($arrayCategoria,categoriaRepository::crearCategoria($array->ID_categoria,$array->Nombre));
            }
            return $arrayCategoria;
        }
    }
?>