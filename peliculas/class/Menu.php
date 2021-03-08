<?php

class Menu {
    public function __construct ($arrayDatos){
        $this->_menu = $arrayDatos;
    }

    public function muestraMenuUsuario($rol){ 
        if ($rol != null){
            foreach ($this->_menu[$rol] as $key => $value) {
                echo '<h4><a href="index.php?'.$value.'">'.$key.'</a></h4>';
            } 
        }   
    }
} 