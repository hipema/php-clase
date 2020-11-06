<?php
// Bloque de documentación
/**
 * Ejercicio 4
 * Mostrar paleta de colores
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
    <title>Ejercicio 4</title>
</head>
<body>
    <h1>Ejercicio 4.</h1>
    <p>Mostrar paleta de colores</p>
    <table>
    </tr>
    <?php
    $i = 0;
    for ($red = 0; $red <= 256; $red += 16){
        if ($red == 256) $red = 255;
        for ($green =0; $green <= 256; $green +=16){
            if ($green == 256) $green = 255;
            for ($blue = 0; $blue <= 256; $blue +=16){
                if ($blue == 256) $blue = 255;
                echo '<td width="10px" height="10px" bgcolor=#'.sprintf("%02s", dechex($red)).sprintf("%02s", dechex($green)).sprintf("%02s", dechex($blue)).'>#'.sprintf("%02s", dechex($red)).sprintf("%02s", dechex($green)).sprintf("%02s", dechex($blue)).'</td>';
            }
           echo '</tr>';
        }
    }
    ?>
    </table>
</body>
</html>