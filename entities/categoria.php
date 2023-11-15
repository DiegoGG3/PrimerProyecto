<?php
class categoria {
    private $id_categoria;
    private $nombre;
        
    public function __construct($id_categoria, $nombre) {
        $this->id_categoria = $id_categoria;
        $this->nombre = $nombre;
    }
     public function get_id_categoria() {
        return $this->id_categoria;
    }
    public function get_nombre() {
        return $this->nombre;
    }
}
?>