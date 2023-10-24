<?php
class user {
    private $id
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
     public function getNombre() {
        return $this->nombre;
    }

    // Setter para establecer el nombre
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Getter para obtener la contraseña
    public function getContraseña() {
        return $this->contraseña;
    }

    // Setter para establecer la contraseña
    public function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }

    // Getter para obtener el rol
    public function getRol() {
        return $this->rol;
    }

    // Setter para establecer el rol
    public function setRol($rol) {
        $this->rol = $rol;
    }
}
?>