<?php
/**
 * @author: manolohidalgo_
 * @since: 12-10-2020
 * 
 * 1. Define un array que permita almacenar y mostrar la siguiente información.
 *      Verbos irregulares en inglés
 */

 $verbos = array  ("Ser, Estar" => array ("be", "was, were", "been"),
                   "Empezar" => array ("begin", "began", "begun"),
                   "Comprar" => array ("buy", "bought", "bought")
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
        <th>Español</th>
        <th>Infitivo</th>
        <th>Pasado</th>
        <th>Participio</th>
        <?php
            foreach ($verbos as $verboSpain => $verboIrregular) {
                echo "<tr><td style=\"border: 1px solid black;\">$verboSpain</td>";
                foreach ($verboIrregular as $verbo) {
                    echo "<td style=\"border: 1px solid black;\">$verbo</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>