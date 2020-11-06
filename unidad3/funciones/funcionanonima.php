<?php
/**
 * @author: manolohidalgo_
 */

 $arrayNumeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

//  En la función array Map, el primer parámetro es una función a realizar,
// En este caso realizado mediante una función anónima, y el segundo parámetro
// es el array que se va a leer como si se tratase de un foreach

 $Cuadrados = array_map(function ($numero){
    return $numero **2;
 }, $arrayNumeros);

print_r($Cuadrados);
?>
