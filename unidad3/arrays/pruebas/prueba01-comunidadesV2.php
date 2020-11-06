<?php

    $spain = array(
        array ("comunidad"=>"Andalucía",
        "provincias"=>array("Almería", "Cádiz", "Córdoba", "Granada", "Huelva", "Jaen", "Malaga", "Sevilla")),
        array ("comunidad"=>"Aragón",
        "provincias"=>array("Huesca", "Teruel", "Zaragoza")),
        array ("comiunidad"=>"Asturias",
        "provincias"=>array("Oviedo")),
        array ("comunidad"=>"Baleares",
        "provincias"=>array("Palma de Mallorca")),
        array ("comunidad"=>"Canarias",
        "provincias"=>array("Santa Cruz de Tenerife", "Las Palmas de Gran Canaria")),
        array ("comunidad"=>"Cantabria",
        "provincias"=>array("Santander")),
        array ("comunidad"=>"Castilla-La Mancha",
        "provincias"=>array("Albacete", "Ciudad Real", "Cuenca", "Guadalajara", "Toledo")),
        array ("comunidad"=>"Cataluña",
        "provincias"=>array("Barcelona", "Gerona", "Lérida", "Tarragona")),
        array ("comunidad"=>"Comunidad Valenciana",
        "provincias"=>array("Alicante", "Castellón de la Plana", "Valencia")),
        array ("comunidad"=>"Extremadura",
        "provincias"=>array("Badajoz", "Cáceres")),
        array ("comunidad"=>"Galicia",
        "provincias"=>array("Lugo", "Orense", "Pontevedra", "A Coruña")),
        array ("comunidad"=>"Madrid",
        "provincias"=>array("Madrid")),
        array ("comunidad"=>"Murcia",
        "provincias"=>array("Murcia")),
        array ("comunidad"=>"Navarra",
        "provincias"=>array("Pamplona")),
        array ("comunidad"=>"País Vasco",
        "provincias"=>array("Bilbao", "San Sebastián", "Vitoria")),
        array ("comunidad"=>"La Rioja",
        "provincias"=>array("Logroño"))
    );


    foreach ($spain as $comunidades){        
        echo '<br><b>COMUNIDAD: '.$comunidades['comunidad'].'</b><br>';
        foreach ($comunidades["provincias"] as $provincias){
            echo "$provincias <br>";
        }
    }