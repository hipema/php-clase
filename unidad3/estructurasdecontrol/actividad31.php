<?php
// Bloque de documentación
/**
 * Ejercicio 1.
 * Cargar dos números en variables y escribir el mayor de ellos.
 * author: manolohidalgo_
 * date: 25-09-2020
 */
    // Iniciación de las variables
    $x = 30;
    $y = 10;
    $maximo;
    if ($x > $y){
        $maximo = $x;
    } else {
        $maximo = $y;
    }
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <h1>Ejercicio 1. </h1>
    <?php
        echo '<b>Se muestra el número mayor de las dos variables</b>';
        echo '</br><b>Variable 1: </b>'.$x;
        echo '</br><b>Variable 2: </b>'.$y;
        echo '</br><b>El valor máximo almacenado en las variables es: '.$maximo;
        ?>
</body>
</html>