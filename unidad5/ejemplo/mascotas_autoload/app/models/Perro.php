<?php

namespace App\Models;
class Perro {
    public function __construct ($nombre){
        $this->_nombre = $nombre;
    }

    public function ladra(){
        echo 'Guau Guau<br>';
    }
} 