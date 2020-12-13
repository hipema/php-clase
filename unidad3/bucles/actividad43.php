<?php
// Bloque de documentación
/**
 * Ejercicio 3
 * Table de multiplicar del 1 al 10
 * author: manolohidalgo_
 * date: 29-09-2020
 */
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Ejercicio 3</title>
</head>
<body>
    <h1>Ejercicio 3.</h1>
    <p><h2>Tabla de multiplicar del 1 al 10.</h2></p>
    <table>
    <?php
    for ($fila = 1; $fila <= 10; $fila++){
        echo '<tr>';
        for ($columna = 1; $columna <= 10; $columna++){
            if ($fila == 1 || $columna == 1){
                echo '<td class="sombreado">'.($fila * $columna).'</td>';
            } else {
                echo '<td>'.($fila * $columna).'</td>';
            }
        }
        echo '</tr>';
    }
    ?>
    </table>
</body>
</html>