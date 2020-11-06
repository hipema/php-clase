<?php
// Bloque de documentación
/**
 * Ejercicio 2.
 * Cargar en variables mes y año, e indicar el número de días del mes.
 * author: manolohidalgo_
 * date: 25-09-2020
 */
    // Iniciación de las variables
    $mes = 2;
    $year = 2020;
    $bisiesto = false;
    $dias;
    if ($mes == 1 || $mes == 3 || $mes == 5 || $mes == 7 || $mes == 8 || $mes ==10 || $mes == 12){
        $dias = 31;
    } elseif ($mes == 4 || $mes == 6 || $mes == 9 || $mes == 11){
        $dias == 30;
    } elseif ($mes == 2){
         // Calculamos si el año es bisiesto
        if ($year % 400 == 0){
            $bisiesto = true;
        }else if ($year % 100 == 0){
            $bisiesto = false;
        }else if ($year % 4 == 0){
            $bisiesto = true;
        }else{
            $bisiesto = false;
        }
        if ($bisiesto){
            $dias = 29;
        } else {
            $dias = 28;
        }
    }
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
    <?php
        echo '<b>Se muestra el número de dias para un valor de mes y año</b>';
        echo '</br><b>Mes: </b>'.$mes;
        echo '</br><b>Año: </b>'.$year;
        echo '</br><b>Días del mes: '.$dias;
        ?>
</body>
</html>