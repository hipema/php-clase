<?php

    $spain = array(
        array ("comunidad"=>"Andalucía", "provincias"=> array("Almería"=>2,
                                                              "Cádiz"=>2,
                                                              "Córdoba"=>100,
                                                              "Granada"=>2,
                                                              "Huelva"=>100,
                                                              "Jaen"=>2,
                                                              "Malaga"=>400,
                                                              "Sevilla"=>2)),                            
        array ("comunidad"=>"Aragón", "provincias"=>array("Huesca"=>2,
                                                          "Teruel"=>2,
                                                          "Zaragoza"=>2)),
        array ("comiunidad"=>"Asturias", "provincias"=>array("Oviedo"=>2)),
        array ("comunidad"=>"Baleares", "provincias"=>array("Palma de Mallorca"=>2)),
        array ("comunidad"=>"Canarias", "provincias"=>array("Santa Cruz de Tenerife"=>2, 
                                                            "Las Palmas de Gran Canaria"=>2)),
        array ("comunidad"=>"Cantabria", "provincias"=>array("Santander"=>2)),
        array ("comunidad"=>"Castilla-La Mancha", "provincias"=>array("Albacete"=>2,
                                                                      "Ciudad Real"=>2,
                                                                      "Cuenca"=>2,
                                                                      "Guadalajara"=>2,
                                                                      "Toledo"=>2)),
        array ("comunidad"=>"Cataluña", "provincias"=>array("Barcelona"=>2,
                                                            "Gerona"=>500,
                                                            "Lérida"=>2,
                                                            "Tarragona"=>2)),
        array ("comunidad"=>"Comunidad Valenciana", "provincias"=>array("Alicante"=>2,
                                                                        "Castellón de la Plana"=>2,
                                                                        "Valencia"=>2)),
        array ("comunidad"=>"Extremadura", "provincias"=>array("Badajoz"=>2,
                                                               "Cáceres"=>2)),
        array ("comunidad"=>"Galicia", "provincias"=>array("Lugo"=>2,
                                                           "Orense"=>2,
                                                           "Pontevedra"=>2,
                                                           "A Coruña"=>2)),
        array ("comunidad"=>"Madrid", "provincias"=>array("Madrid"=>2)),
        array ("comunidad"=>"Murcia", "provincias"=>array("Murcia"=>2)),
        array ("comunidad"=>"Navarra", "provincias"=>array("Pamplona"=>2)),
        array ("comunidad"=>"País Vasco", "provincias"=>array("Bilbao"=>2,
                                                              "San Sebastián"=>2,
                                                              "Vitoria"=>2)),
        array ("comunidad"=>"La Rioja", "provincias"=>array("Logroño"=>2))
    );


    foreach ($spain as $array => $comunidades){  
        // echo var_dump($comunidades).'<br>';      
        $casosCovid = 0;
        foreach ($comunidades['provincias'] as $provincias => $casos){
                $casosCovid += $casos;
        }
        if ($casosCovid > 500){
            echo '<br><span style="color:red"><b>COMUNIDAD: '.$comunidades['comunidad'].' casos COVID: '.$casosCovid.'</b><br></span>';
        } else {
            echo '<br><b>COMUNIDAD: '.$comunidades['comunidad'].' casos COVID: '.$casosCovid.'</b><br>';
        }
        
        foreach ($comunidades["provincias"] as $provincias => $casos){
            echo $provincias.'</br>';
        }
    }