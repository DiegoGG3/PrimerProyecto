<?php
class dificultad {
    private $id_dificultad;
    private $nombre;
        
    public function __construct($id_dificultad, $nombre) {
        $this->id_dificultad = $id_dificultad;
        $this->nombre = $nombre;
    }
     public function get_id_dificultad() {
        return $this->id_dificultad;
    }
    public function get_nombre() {
        return $this->nombre;
    }
}
?>