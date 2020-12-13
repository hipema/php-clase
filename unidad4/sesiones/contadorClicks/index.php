<?php
/**
 * @author: manolohidalgo_
 */
 session_start();
 $titulo = "Ejercicio 2";
 $descripcion = "Realiza un script que permita contar los clicks realizados. Se reinicia con el intervalo superior a 10 segundos.";

 if ((time() - $_SESSION['horaInicio']) > 10){
     unset($_SESSION['count']);
     unset($_SESSION['horaInicio']);
     session_destroy();
     session_start();
     session_regenerate_id(true);
 } else {
     if (empty($_SESSION['count'])){
         $_SESSION['count'] = 1;
     } else {
         $_SESSION['count']++;
         $_SESSION['horaInicio'] = time();
     }
 }
 if (!isset($_SESSION['horaInicio'])) {
     $_SESSION['horaInicio'] = time();
     $_SESSION['count'] = 0;
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
    <nav><h2><?php echo $titulo ?></h2></nav>
    <div class="ejercicio">
        <p>
            <?php echo $descripcion ?>
        </p>
    </div>
    <div class="contenedor">
        <div class="principal">
            <?php
        echo '<p class="contador">'.$_SESSION['count'].'</p>';
        echo "<a href=\"index.php?".htmlspecialchars(SID)."\">Continuar</a>"; ?>
        </div>
        <div class="lateral"></div>
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

