<?php
// Bloque de documentación
/**
 * A veces es necesario conocer exactamente el contenido de una variable.
 * Piensa como puedes hacer esto y escribe un script con la siguiente salida:
 * string(5) “Harry”
 * Harry
 * int(28)
 * NULL
 * @author: manolohidalgo_
 */

    $nombre = "Harry";
    $numero = 23;
    $null;

    echo var_dump($nombre).'</br>';
    echo $nombre.'</br>';
    echo var_dump($numero).'</br>';
    echo var_dump($null);