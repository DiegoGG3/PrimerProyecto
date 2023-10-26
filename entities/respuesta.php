<?php
    class respuesta{
        private $letras;
        private $enunciado;

        public function __construct($letras, $enunciado){
            this->letras = $letras;
            this->enunciado = $enunciado;
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
    }
?>