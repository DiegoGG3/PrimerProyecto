<?php
    class examenRepository{

        public static function crearExamen($id,$fechaHora,$id_creador){
            $examen=new examen($id,$fechaHora,$id_creador);
            return $examen;
        }

        public static function arrayExamen($objetos) {
            $arrayExamen= array();
            foreach($objetos as $array){
                array_push($arrayExamen,examenRepository::crearExamen($array->ID,$array->fecha_inicio,$array->id_creador));
            }
            return $arrayExamen;
        }

        public static function añadirExamen($conexion,$examen){
            $preparedConexion=$conexion->prepare("INSERT INTO examen(id_creador)
            VALUES ( :id_creador)");


            $id_creador=$examen->get_id_creador();

            $preparedConexion->bindParam(':id_creador',$id_creador);

            $preparedConexion->execute();
        }

        public static function asignarPreguntas($conexion, $idExamen,$idPregunta){
            $preparedConexion=$conexion->prepare("INSERT INTO examen_tiene_pregunta(IdExamen, IdPregunta)
            VALUES ( :idExamen, :IdPregunta)");

            $preparedConexion->bindParam(':idExamen',$idExamen);
            $preparedConexion->bindParam(':IdPregunta',$idPregunta);


            $preparedConexion->execute();
        }

        public static function asignarExamen($conexion, $idExamen,$IdUsuario){
            $preparedConexion=$conexion->prepare("INSERT INTO usuario_tiene_examen(IdExamen, IdUsuario)
            VALUES ( :IdExamen, :IdUsuario)");

            $preparedConexion->bindParam(':IdExamen',$idExamen);
            $preparedConexion->bindParam(':IdUsuario',$IdUsuario);


            $preparedConexion->execute();
        }
    }
?>