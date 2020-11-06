<?php
// Bloque de documentación
/**
 * Ejercicio 4.
 * Cabecera en función de la estación del año.
 * author: manolohidalgo_
 * date: 27-09-2020
 */

    // Iniciación de las variables
    $diaActual = new DateTime(date('d.m.Y'));
    $mes = $diaActual->format('m');
    $dia = $diaActual->format('d');
    $diaSemana = $diaActual->format('w');

    // Cálculos para la estación del año
    if ($mes == '01' || $mes == '02'){
        $estacion = 'invierno';
    } else if ($mes == '04' || $mes == '05'){
        $estacion = 'primavera';
    } else if ($mes == '07' || $mes == '08'){
        $estacion = 'verano';
    } else if ($mes == '10' || $mes == '11'){
        $estacion = 'otono';
    } else if ($mes == '03'){
        if ($dia <= 20){
            $estacion = 'invierno';
        } else {
            $estacion = 'primavera';
        }
    } else if ($mes == '06'){
        if ($dia <= 21){
            $estacion = 'primavera';
        } else {
            $estacion = 'verano';
        }
    } else if ($mes == '09'){
        if ($dia <= 23){
            $estacion = 'verano';
        } else {
            $estacion = 'otono';
        }
    } else if ($mes == '12'){
        if ($dia <= 21){
            $estacion = 'otono';
        } else {
            $estacion = 'invierno';
        }
    }

  ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php
        echo '<div><img src="img/'.$estacion.'.jpg" /></div>';
            // Cálculos para el día de la semana
        switch ($diaSemana) {
            case 0:
                echo 'Domingo<br>';
                break;
            case 1:
                echo 'Lunes</br>';
                break;
            case 2:
                echo 'Martes<br>';
                break;
            case 3:
                echo 'Miércoles<br>';
                break;
            case 4:
                echo 'Jueves<br>';
                break;
            case 5:
                echo 'Viernes<br>';
                break;
            case 6:
                echo 'Sábado<br>';
                break;
        }
    ?>
    
    <h1>Ejercicio 4. </h1>
    <?php
        echo '<h1>Varía según la estación del año y día de la semana</h1>';
        echo 'Fecha: '.$diaActual->format("d.m.Y").'</br>';
        ?>
</body>
</html>