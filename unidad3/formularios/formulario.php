<?php
/**
 * @author: manolohidalgo_
 * @since: 13-10-2020
 */
    $datosPersonales = array ("nombre", "apellidos", "email");
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
    <form action="procesa_formulario5.php" method="post">
        <?php
            foreach ($datosPersonales as $datos) {
                echo "<input type=\"text\" name=\"$datos\" placeholder=\"$datos\" value=\"\" />";
            }
            echo "<input type=\"submit\" name=\"enviar\" placeholder=\"Send\" value=\"Enviar\" />";
        ?>
    </form>
</body>
</html>