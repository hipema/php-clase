<?php
/**
 * @author: manolohidalgo_
 * @since: 12-10-2020
 * 
 * 1. Define un array que permita almacenar y mostrar la siguiente información.
 *      Información sobre continentes, países, capitales y banderas.
 */

 $mundo = array  ("Europa" => array ("España" => array ("Madrid", "https://simplybook.asia/uploads/flux3dp/image_files/original/f15ff2a34349df6e0cc7d91786dd38d0.png"),
                                     "Francia" => array ("Paris", "https://i.pinimg.com/originals/c6/54/d2/c654d22b378bdb9da4366f6d0d74e9bc.gif"),
                                     "Italia" => array ("Roma", "https://i.pinimg.com/originals/39/77/ed/3977ed572dfff73d538b91916935d96b.gif")
                                    ),
                  "América del Sur" => array ("Brasil" => array ("Brasilia", "https://www.banderas-mundo.es/data/flags/w580/br.png")
                                    )
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
        <th>Continente</th>
        <th>País</th>
        <th>Capital</th>
        <th>Bandera</th>
        <?php
            foreach ($mundo as $continente => $paises) {
                foreach ($paises as $pais => $capitalBandera) {
                    echo "<tr><td style=\"border: 1px solid black;\">$continente</td>";
                    echo "<td style=\"border: 1px solid black;\">$pais</td>";
                    echo "<td style=\"border: 1px solid black;\">$capitalBandera[0]</td>";
                    echo "<td style=\"border: 1px solid black;\"><img src=\"$capitalBandera[1]\" alt=\"$capitalBandera[0]\" width=\"125\" height=\"75\"/></td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
</body>
</html>