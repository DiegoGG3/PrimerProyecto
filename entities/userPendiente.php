<?php
class userPendiente {
    public $IdPendiente;
    public $nombre;
    public $contraseña;
        
    //Constructor
    public function __construct( $IdPendiente, $nombre, $contraseña) {
        $this->IdPendiente = $IdPendiente;
        $this->nombre = $nombre;
        $this->contraseña = $contraseña;
    }

     // Getter para obtener el nombre
     public function get_Nombre() {
        return $this->nombre;
    }


    // Getter para obtener la contraseña
    public function get_Contraseña() {
        return $this->contraseña;
    }

    public function get_IdPendiente() {
        return $this->IdPendiente;
    }
}
?>