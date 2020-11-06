<?php
// Bloque de documentación
/*
* Script que cargue las siguientes variables:
* $x=10;
* $y=7;
* y muestre
* 10 + 7 = 17
* 10 - 7 = 3
* 10 * 7 = 70
* 10 / 7 = 1.4285714285714
* 10 % 7 = 3
* @author: manolohidalgo_
*/

    // Declaración variables
    $x = 10;
    $y = 7;

    echo '<b>Resultados a mostrar con las variables x='.$x.' y y='.$y.' : </b></br>';
    echo $x.' + '.$y.' = '.($x+$y).'</br>';
    echo $x.' - '.$y.' = '.($x-$y).'</br>';
    echo $x.' * '.$y.' = '.($x*$y).'</br>';
    echo $x.' / '.$y.' = '.($x/$y).'</br>';
    echo $x.' % '.$y.' = '.($x%$y).'</br>';