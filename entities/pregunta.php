

<?php
    class pregunta{
        private $id_pregunta;
        private $enunciado;
        private $respuestas;
        private $categoria;
        private $dificultad;
        private $recurso;

        public function __construct($id_pregunta, $enunciado, $respuestas, $categoria, $dificultad, $recurso) {
            $this->id_pregunta = $id_pregunta;
            $this->enunciado = $enunciado;
            $this->respuestas = $respuestas;
            $this->categoria = $categoria;
            $this->dificultad = $dificultad;
            $this->recurso = $recurso;
        }
    
        public function getIdPregunta() {
            return $this->id_pregunta;
        }
    
        public function getEnunciado() {
            return $this->enunciado;
        }
    
        public function setEnunciado($enunciado) {
             $this->enunciado = $enunciado;
        }
    
        public function getRespuestasJSON() {
            return $this->respuestas;
        }

        public function getRespuestasObjetos() {
            return arrayRespuestas($this);
        }
    
        public function setRespuestas($respuestas) {
             $this->respuestas = $respuestas;
        }
    
        public function getCategoria() {
            return $this->categoria;
        }
    
        public function setCategoria($categoria) {
             $this->categoria = $categoria;
        }
    
        public function getDificultad() {
            return $this->dificultad;
        }
    
        public function setDificultad($dificultad) {
             $this->dificultad = $dificultad;
        }
    
        public function getRecurso() {
            return $this->recurso;
        }
    
        public function setRecurso($recurso) {
             $this->recurso = $recurso;
        }
    
    }
?>