<?php
// Bloque de documentación
/*
@author: manolohidalgo_
*/

    // Ficha personal
    $nombre = "Manolo";
    $apellidos = "Hidalgo Pérez";
    $foto = "img/yo.jpg";
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha personal</title>
</head>
<body>
    <h1>Ficha personal</h1>
    <?php
        echo '<b>Nombre: </b>'.$nombre;
        echo '</br><b>Apellidos: </b>'.$apellidos;
        echo '</br><img src="'.$foto.'"/>';
        ?>
</body>
</html>