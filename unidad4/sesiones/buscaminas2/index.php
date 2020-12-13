<?php
/**
 * @author: manolohidalgo_
 */

 session_start();
 $titulo = "Ejercicio 3";
 $descripcion = "Buscaminas";
 $hayGanador = false;

 if ($_GET['reiniciar']){
        unset($_SESSION['tableroConMinas']);
        unset($_SESSION['tableroVisible']);
        unset($_SESSION['bandera']);
        unset($_SESSION['disabled']);
        unset($_SESSION['casillasBandera']);
        unset($_SESSION['casillasMinas']);
        unset($_SESSION['configuracionPartida']['filas']);
        unset($_SESSION['configuracionPartida']['columnas']);
        session_destroy();
        session_start();
        session_regenerate_id(true);
 }

 if (isset($_GET['fila']) && isset($_GET['columna'])){
    $fila = intval($_GET['fila']);
    $columna = intval($_GET['columna']);
    if ($_SESSION['bandera'] == false ){
        clickCasilla($fila, $columna);
    } else {
        $estabaMarcado = false;
        if (!empty($_SESSION['casillasBandera'])){
            for ($i = 0; $i < sizeof($_SESSION['casillasBandera']); $i++){
                if ($_SESSION['casillasBandera'][$i][0] == $fila && $_SESSION['casillasBandera'][$i][1] == $columna){
                    unset($_SESSION['casillasBandera'][$i]);
                    $_SESSION['casillasBandera'] = array_values($_SESSION['casillasBandera']);
                    $estabaMarcado = true;
                } 
            }
        }
        if (!$estabaMarcado) array_push($_SESSION['casillasBandera'], [$fila, $columna]);
    }
 }

 if ($_GET['bandera'] == "true"){
     $_SESSION['bandera'] = true;
 } else if ($_GET['bandera'] == "false"){
    $_SESSION['bandera'] = false;
 }

 if (!isset($_SESSION['tableroConMinas'])){
    $_SESSION['tableroConMinas'];
    $_SESSION['tableroVisible'];
    $_SESSION['configuracionPartida']['filas'] = 10;
    $_SESSION['configuracionPartida']['columnas'] = 10;
    $_SESSION['bandera']=false;
    $_SESSION['casillasBandera']=[];
    $_SESSION['casillasMinas']=[];
    $_SESSION['disabled']="";
    crearTableros();   
 }

 if (sizeof($_SESSION['casillasMinas']) == sizeof($_SESSION['casillasBandera'])){
    $contadorCoincidencias = 0; 
    foreach ($_SESSION['casillasMinas'] as $casillaMina){
        foreach ($_SESSION['casillasBandera'] as $casillaBandera) {
            if ($casillaMina[0] == $casillaBandera[0] && $casillaMina[1] == $casillaBandera[1]) $contadorCoincidencias++;
        }
    }
    if ($contadorCoincidencias == 10) $hayGanador = true;
 }
 function crearTableros(){
     for ($i = 0; $i < $_SESSION['configuracionPartida']['filas']; $i++){
         for ($j = 0; $j < $_SESSION['configuracionPartida']['columnas']; $j++ ){
            $_SESSION['tableroConMinas'][$i][$j] = 0;
            $_SESSION['tableroVisible'][$i][$j] = 0;
         }
     }
     insertarMinas();
 }

 function insertarMinas(){
    $contador = 0; 
    do {
        $fila = random_int(0,$_SESSION['configuracionPartida']['filas']-1);
        $columna = random_int(0,$_SESSION['configuracionPartida']['columnas']-1);
        if ($_SESSION['tableroConMinas'][$fila][$columna] != 9){
            $_SESSION['tableroConMinas'][$fila][$columna] = 9;
            array_push($_SESSION['casillasMinas'], [$fila, $columna]);
            sumamosAlrededor($fila, $columna);
            $contador++;
        }
    } while ($contador < 10);
 }

 function sumamosAlrededor($fila, $columna){
    for ($i = max($fila-1,0); $i <= min($fila+1, $_SESSION['configuracionPartida']['filas']-1); $i++){
        for ($j = max($columna-1,0); $j <= min($columna+1, $_SESSION['configuracionPartida']['columnas']-1); $j++){
            if ($_SESSION['tableroConMinas'][$i][$j] != 9) $_SESSION['tableroConMinas'][$i][$j]++;
        }
    }
 }

 function clickCasilla($fila, $columna){
    if ($_SESSION['tableroVisible'][$fila][$columna] == 0){
        $_SESSION['tableroVisible'][$fila][$columna] = 1;
         if ($_SESSION['tableroConMinas'][$fila][$columna] == 9){
             finPartida();
         } else {
            if ($_SESSION['tableroConMinas'][$fila][$columna] == 0){
                for ($i = max($fila-1,0); $i <= min($fila+1, $_SESSION['configuracionPartida']['filas']-1); $i++){
                    for ($j = max($columna-1,0); $j <= min($columna+1, $_SESSION['configuracionPartida']['columnas']-1); $j++){
                        clickCasilla($i, $j);
                    }
                }
            }
         }
    }
 }

 function finPartida(){
    $_SESSION['disabled'] = "disabled";
 }

 function muestraResultado($fila, $columna){
    return $_SESSION['tableroConMinas'][$fila][$columna];
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
            <table>
            <?php
                $contador = 0;
                for ($i = 0; $i < sizeof($_SESSION['tableroVisible']); $i++){
                    for ($j = 0; $j < sizeof($_SESSION['tableroVisible']); $j++){
                        $finDeLinea = "";
                        $inicioDeLinea = "";
                        $visibilidad = "";
                        $esCasillaBandera = false;
                        if (!empty($_SESSION['casillasBandera'])){
                            foreach ($_SESSION['casillasBandera'] as $casilla) {
                                if ($casilla[0] == $i && $casilla[1] == $j) $esCasillaBandera = true;
                            }
                        }
                        if ($contador == 9) $finDeLinea = "</tr>";
                        if ($contador == 0) $inicioDeLinea = "<tr>";
                        if ($_SESSION['tableroVisible'][$i][$j]==0){
                            if ($esCasillaBandera && $_SESSION['bandera'] == false){
                                echo $inicioDeLinea.'<td><a href="index.php?fila='.$i.'&columna='.$j.'"><input type="button" class="bandera" disabled></a></td>'.$finDeLinea;
                            } else if ($esCasillaBandera && $_SESSION['bandera'] == true){
                                echo $inicioDeLinea.'<td><a href="index.php?fila='.$i.'&columna='.$j.'"><input type="button" class="bandera"></a></td>'.$finDeLinea;
                            } else {
                                echo $inicioDeLinea.'<td><a href="index.php?fila='.$i.'&columna='.$j.'"><input type="button" class="oculto" '.$_SESSION['disabled'].'></a></td>'.$finDeLinea;
                            }
                        } else {
                            $estado = "";
                            if (muestraResultado($i,$j) == 9) $estado = "error";
                            echo $inicioDeLinea.'<td class="'.$estado.'">'.muestraResultado($i, $j).'</td>'.$finDeLinea;
                            
                        }
                        $contador++;
                        if ($contador == 10) $contador = 0;
                    }
                }
                ?>
                </table>

        </div>
        <div class="lateral">

            <h4>Reiniciar Partida</h4>
            <a href="index.php?reiniciar=true"><input type="button" value="Reiniciar partida"></a>
            
            <h4>Opciones de juego</h4>
            <!-- Activar modo bandera -->
            <?php
            $opcionBandera = ($_SESSION['bandera'] == false) ? "true" : "false";
            $textoBoton = ($_SESSION['bandera'] == false) ? "Activar modo bandera" : "Volver modo normal";
            ?>
            <a href="index.php?bandera=<?php echo $opcionBandera?>"><input type="button" value="<?php echo $textoBoton?>"></a>
            <?php
            if ($_SESSION['disabled'] == "disabled" && $_SESSION['bandera'] == false){
                echo "<h5>Perdiste la partida, has pisado una mina</h5>";
            } else if ($hayGanador){
                echo "<h5>¡Enhorabuena! has conseguido desactivar todas las minas</h5>";
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

