<?php

    $spain = array(
        "Andalucia"=>array("Almería", "Cádiz", "Córdoba", "Granada", "Huelva", "Jaen", "Malaga", "Sevilla"),
        "Galicia"=>array("Lugo", "Orense", "Pontevedra", "A Coruña")
    );
    foreach ($spain as $clave => $comunidades){
        echo "<br><b>COMUNIDAD: $clave</b><br>";
        foreach ($comunidades as $provincia){
            echo $provincia.'</br>';
        }
    }