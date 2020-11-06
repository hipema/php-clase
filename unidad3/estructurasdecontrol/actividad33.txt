<?php
// Bloque de documentación
/**
 * Ejercicio 3.
 * Cargar fecha de nacimiento en una variable y calcular edad.
 * author: manolohidalgo_
 * date: 27-09-2020
 */
    // Iniciación de las variables
    $fechaNacimiento = new DateTime('2011-01-01');
    $diaActual = time();
    $diaActualDT = new DateTime("@$diaActual");
    $intervalo = date_diff($fechaNacimiento,$diaActualDT);
    
  ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <h1>Ejercicio 3. </h1>
    <?php
        echo '<h1>Calcula la diferencia entre una fecha de nacimiento y el día actual</h1>';
        echo 'Fecha de nacimiento: '.$fechaNacimiento->format("d.m.Y").'</br>';
        echo 'Fecha actual: '.$diaActualDT->format("d.m.Y").'</br>';
        echo $intervalo->y.' años '.$intervalo->m.' meses '.$intervalo->d.' días.';
        ?>
</body>
</html>