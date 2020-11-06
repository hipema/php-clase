<?php
// Bloque de documentación
/**
 * Ejercicio 5.
 * Lista de enlaces en función del perfil de usuario
 * author: manolohidalgo_
 * date: 28-09-2020
 */

    // Iniciación de las variables
    $usuario = 'profesor';
    $enlaces;

    // Analizamos el perfil del usuario, si es alumno accede al curso 
    if ($usuario == 'alumno'){
        $enlaces = '<a href="actividades/00ejerciciosbasicos/">Ejercicios básicos 1</a></br>
        <a href="actividades/01ejerciciosbasicos/">Ejercicios básicos 2</a>';
    } elseif ($usuario == 'profesor'){
        $enlaces = '<a href="actividades/00ejerciciosbasicos/">Ejercicios básicos 1</a>';
    }
  ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>    
    <h1>Ejercicio 5. </h1>
    <p>Este ejercicio muestra unos enlaces en función del perfil de usuario:
    <?php
        echo '</br><b>Perfil de usuario: </b>'.$usuario;
        echo '</br><b> Listado de enlaces: </b></br>';
        echo $enlaces;
        ?>
</body>
</html>