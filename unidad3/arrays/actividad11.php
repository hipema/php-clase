<?php
/**
 * @author: manolohidalgo_
 * @since: 12-10-2020
 * 
 * 1. Define un array que permita almacenar y mostrar la siguiente información.
 *      Meses del año. 
 */

 $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
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
    <table>
        <?php
        foreach ($meses as $mes) {
            echo "<tr><td>$mes</td></tr>";
        }
        ?>    
    </table>
</body>
</html>