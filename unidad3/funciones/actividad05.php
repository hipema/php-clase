<?php
/**
 * @author: manolohidalgo_
 * @since: 27-10-2020
 * Escribir un script que muestre una lista de enlaces.
 * Los enlaces serán creados por una función que recibirá
 * como como parámetro un array con las opciones necesarias.
 */

function muestraEnlaces($arrayInformacion){
    echo '<table>';
    foreach ($arrayInformacion as $key => $diario) {
        echo '<tr><td>'.$diario['nombre'].'</td><td><a href="'.$diario['web'].'" target="_blank"> Enlace</a></td></tr>';
    }
    echo '</table>';
}

$datos = array(array('nombre'=>"Marca", 'web' => "http://www.marca.com"), array('nombre'=>"As", "web"=> "http://www.as.com"), array('nombre'=>"Sport", 'web' => "http://www.sport.es"));
muestraEnlaces($datos);
?>