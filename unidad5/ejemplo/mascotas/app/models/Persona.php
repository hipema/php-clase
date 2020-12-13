<?php
namespace App\Models;
class Persona {
    public function __construct ($nombre, $apellido){
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
    }

    public function saluda(){
        echo 'Hola soy una persona que me llamo '.$this->__toString().'<br>';
    }

    public function __toString() {
        return $this->_nombre.' '.$this->_apellido;
    }
} 