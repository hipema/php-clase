<?php
/**
 * @author: manolohidalgo_
 * @since: 12-10-2020
 * 
 * 1. Define un array que permita almacenar y mostrar la siguiente información.
 *      Tablero para jugar al juego de los barcos
 */

 $tablero = array(
                array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J"),
                array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J"),
                array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J"),
                array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J"),
                array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J"),
                array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J"),
                array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J"),
                array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J"),
                array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J"),
                array ("A", "B", "C", "D", "E", "F", "G", "H", "I", "J")
            ); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="manolohidalgo_"/>
    <title>Manolo Hidalgo - 2º DAW</title>
</head>
<body>
    <table style="border: 1px solid black;">
        <?php
            for ($i = 0; $i < count($tablero); $i++){
                echo '<tr>';
                foreach ($tablero[$i] as $posicion) {
                    echo '<td style="border: 1px solid black;">'.($i+1).$posicion.'</td>';
                }
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>