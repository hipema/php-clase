<?php
    /**
     * @author: manolohidalgo_
     */
    // Escriba una página que permita crear una cookie de duración limitada, comprobar el estado de la cookie y destruirla.
    $titulo = "Ejercicio 1";
    $descripcion = "Escriba una página que permita crear una cookie de duración limitada, comprobar el estado de la cookie y destruirla.";
    $cookie = $_COOKIE['user'] ?? null; // asigna el valor de $_COOKIE['user'] o null en caso de que esta no existiese.
    if (!isset($_COOKIE['user'])){
        setcookie("user", "Edgar Allan Poe", time()+3600);
    }

    if (isset($_GET['eliminar']) && $_GET['eliminar'] = true){
        setcookie("user", "Edgar Allan Poe", time()-3600);
        $cookie = null;
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="manolohidalgo_"/>
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/estilo.css">
    <script src="https://use.fontawesome.com/0fbf2b9dd0.js"></script>
    <title>Manolo Hidalgo - 2º DAW</title>
</head>
<body>
    <header><img src="./img/logo-manolohidalgo.png" alt=""></header>
    <nav><h2><?php echo $titulo?></h2></nav>
    <div class="ejercicio">
        <p>
            <?php echo $descripcion ?>
        </p>
    </div>
    <div class="contenedor">
        <div class="principal">
        <?php 

        if ($cookie != null){
            echo '<p><b>Valor de $cookie: </b>'.$cookie.'</p>';

            echo '<p><b><a href="index.php?eliminar=true">Eliminar Cookie</a></b></p>';

        } else {
            echo 'No hay cookie almacenada';
        }
        
        ?>

        </div>
    </div>
    <footer>
        <div class="redes">
        <div><a href="http://www.twitter.com/manolohidalgo_" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i><span class="redesNombre">Twitter</span</a></div>
        <div><a href="https://www.linkedin.com/in/manuelhidalgoperez/" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i><span class="redesNombre">Linkedin</span</a></div>
        <div><a href="https://github.com/hipema" target="_blank"><i class="fa fa-github" aria-hidden="true"></i><span class="redesNombre">Github</span</a></div>
        <div><a href="http://www.manolohidalgo.com" target="_blank"><i class="fa fa-user-circle" aria-hidden="true"></i><span class="redesNombre">Web Personal</span</a></div>
        </div>
    </footer>
</body>
</html>