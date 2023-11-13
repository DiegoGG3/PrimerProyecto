<?php
class userPendiente {
    public $IdPendiente;
    public $nombre;
    public $contraseña;
    public $rol;

        
    //Constructor
    public function __construct( $IdPendiente, $nombre, $contraseña, $rol) {
        $this->IdPendiente = $IdPendiente;
        $this->nombre = $nombre;
        $this->contraseña = $contraseña;
        $this->rol = $rol;

        
    }
    public function set_IdPendiente($IdPendiente) {
        $this->IdPendiente = $IdPendiente;
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
    public function set_Rol($rol) {
        $this->rol = $rol;
    }
    public function get_Rol() {
        return $this->rol;
    }
}
?>