<?php
class examen {
    private $nombre;
    private $contraseña;
    private $rol;
        
    //Constructor
    public function __construct($nombre, $contraseña, $rol) {
        $this->nombre = $nombre;
        $this->contraseña = $contraseña;
        $this->rol = $rol;
    }

     // Getter para obtener el nombre
     public function get_Nombre() {
        return $this->nombre;
    }

    // Setter para establecer el nombre
    public function set_Nombre($nombre) {
        $this->nombre = $nombre;
    }

    // Getter para obtener la contraseña
    public function get_Contraseña() {
        return $this->contraseña;
    }

    // Setter para establecer la contraseña
    public function set_Contraseña($contraseña) {
        $this->contraseña = $contraseña;
    }

    // Getter para obtener el rol
    public function get_Rol() {
        return $this->rol;
    }

    // Setter para establecer el rol
    public function set_Rol($rol) {
        $this->rol = $rol;
    }
}
?>