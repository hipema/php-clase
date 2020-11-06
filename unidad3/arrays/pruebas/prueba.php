<?php
    $clase = array (array("nombre" => "Manolo", "apellidos" => "Hidalgo Pérez", "edad" => 34),
                    array("nombre" => "Pepe", "apellidos" => "Gálvez Rodríguez", "edad" => 28),
                    array("nombre" => "Juan", "apellidos" => "Marqués Ortiz", "edad" => 19));

    foreach ($clase as $alumno) {
        echo "<b>Alumno</b></br>";
        foreach ($alumno as $clave => $valor) {
            echo $clave.': '.$valor.'</br>';
        }
        echo "<p>";
    }
    
?>