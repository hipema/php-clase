<?php
/**
 * @author: manolohidalgo_
 */
session_start();
 if (isset($_POST)){
    if ($_POST['reiniciar']){
        unset($_SESSION['tableroConMinas']);
        unset($_SESSION['tableroVisible']);
        unset($_SESSION['bandera']);
        unset($_SESSION['configuracionPartida']['filas']);
        unset($_SESSION['configuracionPartida']['columnas']);
        session_destroy();
        session_start();
        session_regenerate_id(true);
    } else {
        foreach ($_POST as $key => $value) {
            $fila = substr($key,0,1);
            $columna = substr($key,2);
            clickCasilla($fila, $columna);
        }
    }
 }
 if (!isset($_SESSION['tableroConMinas'])){
    $_SESSION['tableroConMinas'];
    $_SESSION['tableroVisible'];
    $_SESSION['configuracionPartida']['filas'] = 10;
    $_SESSION['configuracionPartida']['columnas'] = 10;
    $_SESSION['bandera']=false;
    crearTableros();   
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
    //  echo 'Perdiste pringado';
 }

 function muestraResultado($fila, $columna){
    return $_SESSION['tableroConMinas'][$fila][$columna];
 }

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="icon" type="image/png" href="http://localhost/img/logo-manolohidalgo-redondo.png" />
	<meta charset="utf-8">
	<meta name="description" content"Manolo Hidalgo">
    <meta name="keywords" content"Manolo, Hidalgo, DAW, Diseño de Aplicaciones Web">
    <link rel="alternate" type="application/rss+xml" title="Manolo Hidalgo - Desarrollador de Aplicaciones Web" href="https://hipema.github.io/rss/rss_html.xml" />
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://localhost/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/1033c8428d.js" crossorigin="anonymous"></script>
    <title>Manolo Hidalgo - 2º DAW</title>
</head>
<body>
        <div class="container">
            <header id="top">
            <!-- Imagen de cabecera -->
            <img src="http://localhost/img/logo-manolohidalgo-fondo-claro.png" alt="Manolo Hidalgo" class="py-4" width="75%">
            <!-- Menú -->
            <div class="row">
                <ul class="nav nav-tabs text-bold">
                    <li class="nav-item"><a class="nav-link text-secondary" href="../index.html">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link active text-dark" href="dwes.php">DWES</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="dwec.html">DWEC</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="diw.html">DIW</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="daw.html">DAW</a></li>
                </ul>
            </div>
            </header>
            <!-- Frase central -->
            <div class="row">
                <div class="container-fluid bg-dark"><h2 class="text-light text-center">Desarrollo Web en Entorno Servidor</h2></div>
            </div>
            
            <!-- Cuerpo de la página -->
            <div class="container-fluid py-4">
                <h3>Buscaminas</h3>
                <div class="contenedor"><div class="principal">
                <?php
                echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
                // Mostrar tablero
                $contador = 0;
                for ($i = 0; $i < sizeof($_SESSION['tableroVisible']); $i++){
                    for ($j = 0; $j < sizeof($_SESSION['tableroVisible']); $j++){
                        if ($contador == 9){
                            if ($_SESSION['tableroVisible'][$i][$j] == 0){
                                echo '<input class="noVisible" type="submit" name="'.$i.' '.$j.'" value="'.$i.' '.$j.'" /><br/>'; 
                            } else {
                                echo '<input class="visible" type="button" value="'.muestraResultado($i, $j).'" disabled /><br/>';
                            }
                            $contador = 0;
                        } else {
                            if ($_SESSION['tableroVisible'][$i][$j] == 0){
                                echo '<input class="noVisible" type="submit" name="'.$i.' '.$j.'" value="'.$i.' '.$j.'" />';
                            } else {
                                echo '<input class="visible" type="button" value="'.muestraResultado($i, $j).'" disabled />';
                            }
                            $contador++;
                        }
                    }
                }
                echo '</form>';
                ?>
                </div>
                <div class="lateral">
                    <?php
                    echo '<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
                    echo '<input class="opciones" type="button" value="Colocar bandera">';
                    echo '<input class="opciones" type="button" value="Reiniciar partida">';
                    echo '</form>';
                    ?>
                </div></div>
                </div>
                <div class="row">
                    <div class="container text-center py-3"><span class="align-items-center"><a href="#top"><i class="fas fa-angle-double-up"></i> Inicio de Página</a></span></div>
                </div>
            </div>
            
        <!-- Footer -->
        
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small bg-dark text-light py-1">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">
    
        <!-- Footer links -->
        <div class="row text-center text-md-left mt-3 pb-3">
    
            <!-- Grid column -->
            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-4">
            <h6 class="text-uppercase mb-4 font-weight-bold">ÚLTIMAS ENTRDAS EN EL BLOG</h6>
                <p><a href="https://manolohidalgo.com/2020/10/03/atajos-de-teclado-en-visual-studio-code-para-mac/" target="_blank">Atajos de teclado</a></p>
                <p><a href="https://manolohidalgo.com/2020/10/02/1o-de-daw-bajo-mi-experiencia-ii" target="_blank">1º DAW bajo mi experiencia (II)</a></p>
                <p><a href="https://manolohidalgo.com/2020/10/02/1o-de-daw-bajo-mi-experiencia-iii/" target="_blank">1º DAW bajo mi experiencia (III)</a></p>
            </div>
            <!-- Grid column -->
    
            <hr class="w-100 clearfix d-md-none">
    
            <!-- Grid column -->
            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-4">
            <h6 class="text-uppercase mb-4 font-weight-bold">WEBS RELACIONADAS</h6>
            <p>
                <a href="https://www.manolohidalgo.com/" target="_blank">Manolo Hidalgo</a>
            </p>
            <p>
                <a href="https://www.subeunescalon.com/" target="_blank">Sube un Escalón</a>
            </p>
            </div>
            <!-- Grid column -->
    
            <hr class="w-100 clearfix d-md-none">
    
            <!-- Grid column -->
            <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-4">
            <h6 class="text-uppercase mb-4 font-weight-bold">OTRAS WEBS DE INTERÉS</h6>
            <p>
                <a href="http://medinaazahara.es" target="_blank">Medina Azahara</a>
            </p>
            <p>
                <a href="http://latiendademedinaazahara.com" target="_blank">Tienda de Medina Azahara</a>
            </p>
            <p>
                <a href="http://www.subeunescalon.com/menudigital/espak-king-kebab.html" target="_blank">Menú Digital Espak King Kebab</a>
            </p>
            </div>
        </div>
        <!-- Footer links -->
    
        <hr>
    
        <!-- Grid row -->
        <div class="row d-flex align-items-center">
    
            <!-- Grid column -->
            <div class="col-md-7 col-lg-8">
    
            <!--Copyright-->
            <p class="text-center text-md-left">© 2020 Copyright:
                <a href="https://manolohidalgo.com/" target="_blank">
                <strong>Manolo Hidalgo</strong>
                </a>
            </p>
    
            </div>
            <!-- Grid column -->
    
            <!-- Grid column -->
            <div class="col-md-5 col-lg-4 ml-lg-0">
    
            <!-- Social buttons -->
            <div class="text-center text-md-right">
                <ul class="list-unstyled list-inline">
                <li class="list-inline-item">
                    <a class="btn-floating btn-sm rgba-white-slight mx-1 text-light" href="https://www.twitter.com/manolohidalgo_" target="_blank">
                    <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-sm rgba-white-slight mx-1 text-light" href="https://github.com/hipema" target="_blank">
                        <i class="fab fa-github"></i>
                        </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-sm rgba-white-slight mx-1 text-light" href="https://www.linkedin.com/in/manuelhidalgoperez" target="_blank">
                    <i class="fab fa-linkedin-in"></i>
                    </a>
                </li>
                </ul>
            </div>
    
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->
        </div>
        <!-- Footer Links -->
    </footer>
    <!-- Footer -->
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="./js/bootstrap.js"></script>
</body>
</html>