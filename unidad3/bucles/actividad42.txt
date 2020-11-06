<?php
// Bloque de documentación
/**
 * Ejercicio 2
 * Sumar los tres primeros números pares
 * author: manolohidalgo_
 * date: 29-09-2020
 */
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <h1>Ejercicio 2. </h1>
    <p>Sumar los tres primeros números pares</p>
    <?php
    $par = 2;
    for($i = 1; $i <= 3; $i++){
        echo $i.' número par es '.$par.'<br>';
        $par +=2;
    }
    ?>
</body>
</html>