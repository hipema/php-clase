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
    <h1>Ejercicio 3. </h1>
    <p>Tabla de multiplicar del 1 al 10.</p>
    <table>
    <tr><th>Número 1</th>
    <th>Número 2</th>
    <th>Resultado</th>
    </tr>
    <?php
    $numero1 = 1;
    $numero2 = 1;
    do {
        $estilo;
        if ($numero2%2 == 0){
            $estilo = 'par';
        } else {
            $estilo = 'impar';
        }
        echo '<tr id="'.$estilo.'"><td>'.$numero1.'</td>';
        echo '<td>'.$numero2.'</td>';
        echo '<td>'.$numero1*$numero2.'</td></tr>';
        $numero2++;
    } while ($numero2 <= 10);
    ?>
    </table>
</body>
</html>

<!--
    Tabla de multiplicar
    ====================

    