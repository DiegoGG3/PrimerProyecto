<?php
class DB{
    private $conexion;

    public function abreConexion(){
        if($this->conexion==null){
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $this->conexion = new PDO('mysql:host=localhost;dbname=proyecto1', 'Diego', '7743', $opciones);
        }

    }

    public function getConexion() {
        return $this->conexion;
    }
}

?>