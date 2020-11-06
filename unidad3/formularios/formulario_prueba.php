<?php
/**
 * @author: manolohidalgo_
 * @since: 13-10-2020
 */
    $ctdNumeros = 4;
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
    <form action="procesa_formulario6.php" method="post">
        <?php
            for ($i=0; $i < $ctdNumeros; $i++){
                echo '<input type="text" name="textos'.$i.'"><br/>';
            }
            echo "<input type=\"submit\" name=\"enviar\" placeholder=\"Send\" value=\"Enviar\" />";
        ?>
    </form>
</body>
</html>