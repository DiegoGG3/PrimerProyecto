<?php
    class respuesta implements JsonSerializable{
        private $letras;
        private $id;
        private $enunciado;
        private $buena;

        public function __construct($id, $letras, $enunciado, $buena){
            $this->id = $id;
            $this->letras = $letras;
            $this->enunciado = $enunciado;
            $this->buena = $buena;
        }
    

        // Getter para obtener las letras
        public function get_letras() {
            return $this->letras;
        }

        public function set_letras($letras) {
            $this->letras = $letras;
        }

        // Getter para obtener los enunciados
        public function get_enunciado() {
            return $this->enunciado;
        }

        public function set_Enunciado($enunciado) {
            $this->enunciado = $enunciado;
        }

        public function jsonSerializable(){
            $vars = get_object_vars($this);
            return $vars;
        }
    }
?>