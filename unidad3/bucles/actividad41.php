<?php
// Bloque de documentación
/**
 * Ejercicio 1.
 * Escribir los números 1 al 10.
 * author: manolohidalgo_
 * date: 29-09-2020
 */
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
    <p>Escribe los números del 1 al 10</p>
    <?php
    for ($i = 1; $i <= 10; $i++){
        echo $i.'</br>';
    }
    ?>
</body>
</html>