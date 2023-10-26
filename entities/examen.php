<?php
class examen {
    private $id;
    private $fechaHora;
    private $id_creador;
        
    //Constructor
    public function __construct($id, $fechaHora, $id_creador) {
        $this->id = $id;
        $this->fechaHora = $fechaHora;
        $this->id_creador = $id_creador;
    }

     // Getter para obtener el id
     public function get_id() {
        return $this->id;
    }


    // Getter para obtener la fecha$fechaHora
    public function get_fecha$fechaHora() {
        return $this->fecha$fechaHora;
    }

    
    // Getter para obtener la id del creador
    public function get_idcreador$id_creador() {
        return $this-$id_creador$id_creador;
    }

    
}
?>