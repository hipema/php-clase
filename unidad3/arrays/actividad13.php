<?php
/**
 * @author: manolohidalgo_
 * @since: 12-10-2020
 * 
 * 1. Define un array que permita almacenar y mostrar la siguiente información.
 *      Nota de los alumnos de 2º DAW para el módulo DWES.
 */

 $dwes = array  ("Manolo Hidalgo" => 8,
                    "Pepe Reina" => 7,
                    "Jose Gálvez" => 9,
                    "Antonio Rico" =>5,
                    "Benito Camelas" => 3,
                    "Armando Bronca" => 1,
                    "Rosa Mela" => 6
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
        <th>Alumno</th>
        <th>Nota</th>
        <?php
            foreach ($dwes as $nombre => $nota) {
                echo "<tr><td style=\"border: 1px solid black;\">$nombre</td>";
                echo "<td style=\"border: 1px solid black;\">$nota</td></tr>";
            }
        ?>
    </table>
</body>
</html>