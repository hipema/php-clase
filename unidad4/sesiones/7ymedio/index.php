<?php
/**
 * @author: manolohidalgo_
 */

session_start();
if ($_POST['reiniciar']){
    unset($_SESSION['arrayCartas']);
    unset($_SESSION['arrayCartasJ1']);
    unset($_SESSION['arrayCartasJ1']);
    unset($_SESSION['jugadorEnCurso']);
    unset($_SESSION['puntuacionJ1']);
    unset($_SESSION['puntuacionJ2']);
    unset($_SESSION['finPartida']);
    session_destroy();
    session_start();
    session_regenerate_id(true);
}

if ($_POST['plantarse']){
    $_SESSION['jugadorEnCurso'] = 2;
    do{
        sacarCarta();
    } while ($_SESSION['puntuacionJ2'] <= 6 && $_SESSION['puntuacionJ2'] <= $_SESSION['puntuacionJ1']);
    $_SESSION['finPartida'] = true;
}

if (!isset($_SESSION['jugadorEnCurso'])){
    $_SESSION['arrayCartas'] = array(array("basto", 1), array("basto", 2), array("basto", 3), array("basto", 4),
                                     array("basto", 5), array("basto", 6), array("basto", 7), array("basto", 8),
                                     array("basto", 9), array("basto", 10),
                                     array("copa", 1), array("copa", 2), array("copa", 3), array("copa", 4),
                                     array("copa", 5), array("copa", 6), array("copa", 7), array("copa", 8),
                                     array("copa", 9), array("copa", 10),
                                     array("espada", 1), array("espada", 2), array("espada", 3), array("espada", 4),
                                     array("espada", 5), array("espada", 6), array("espada", 7), array("espada", 8),
                                     array("espada", 9), array("espada", 10),
                                     array("oro", 1), array("oro", 2), array("oro", 3), array("oro", 4),
                                     array("oro", 5), array("oro", 6), array("oro", 7), array("oro", 8),
                                     array("oro", 9), array("oro", 10));
    $_SESSION['arrayCartasJ1'] = array ();
    $_SESSION['arrayCartasJ2'] = array ();
    $_SESSION['jugadorEnCurso'] = 1;
    $_SESSION['puntuacionJ1'] = 0;
    $_SESSION['puntuacionJ2'] = 0;
    $_SESSION['finPartida'] = false;
}
if ($_POST['sacarCarta']){
    sacarCarta();
}

function sacarCarta() {
    if (!$_SESSION['finPartida']){
        if ($_SESSION['jugadorEnCurso'] == 1){
            $jugador = 'arrayCartasJ1';
        } else {
            $jugador = 'arrayCartasJ2';
        }
        do {
            $carta = random_int(0,39);
        } while (in_array($carta, $_SESSION['arrayCartasJ1']) || in_array($carta, $_SESSION['arrayCartasJ2']));
        array_push($_SESSION[$jugador], $carta);
        calcularPuntuacion();
    }
}

function comprobarSiPierde(){
    if (($_SESSION['puntuacionJ1'] > 7.5) || ($_SESSION['puntuacionJ2'] > 7.5)){
        $_SESSION['finPartida'] = true;
    };
}

function calcularPuntuacion(){
    $jugadores = ['arrayCartasJ1', 'arrayCartasJ2'];
    foreach ($jugadores as $jugador) {
        $suma = 0;
        foreach ($_SESSION[$jugador] as $carta) {
            $valorCarta = $_SESSION['arrayCartas'][$carta][1];
            if ($valorCarta <= 7){
                $suma += $valorCarta;
            } else {
                $suma += 0.5;
            }
        }
        if ($jugador == 'arrayCartasJ1'){
            if ($suma > 7.5) $_SESSION['finPartida'] = true;
            $_SESSION['puntuacionJ1'] = $suma;
        } else {
            if ($suma > 7.5) $_SESSION['finPartida'] = true;
            $_SESSION['puntuacionJ2'] = $suma;
        }
    }
}

function mostrarCartas($numJugador){
    if ($numJugador == 1){
        $jugador = 'arrayCartasJ1';
    } else {
        $jugador = 'arrayCartasJ2';
    }
    foreach ($_SESSION[$jugador] as $carta) {
        echo '<img src="./img/'.$_SESSION['arrayCartas'][$carta][0].'/'.$_SESSION['arrayCartas'][$carta][1].'.jpg" alt="">';
    }
}

function comprobarGanador() {
    if ($_SESSION['puntuacionJ1'] > 7.5){
        return 2;
    } else if ($_SESSION['puntuacionJ2'] > 7.5){
        return 1;
    } else if ($_SESSION['puntuacionJ1'] > $_SESSION['puntuacionJ2']){
        return 1;
    } else if ($_SESSION['puntuacionJ1'] < $_SESSION['puntuacionJ2']){
        return 2;
    } else if ($_SESSION['puntuacionJ1'] == $_SESSION['puntuacionJ2']){
        return 0;
    }

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="manolohidalgo_"/>
    <link rel="stylesheet" href="style.css">
    <title>Manolo Hidalgo - 2º DAW</title>
</head>
<body>
    <header><img src="./img/logo-manolohidalgo.png" alt="Logo Manolo Hidalgo"></header>
    <div class="contenedor">
        <div class="principal">
        <div>
            <?php
                echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="post">';
                if ($_SESSION['finPartida']){
                    echo '<input type="submit" name="sacarCarta" value="Sacar Carta" disabled>';
                    echo '<input type="submit" name="plantarse" value="Plantarse" disabled></form>';
                } else if ($_SESSION['puntuacionJ1'] == 7.5){
                    echo '<input type="submit" name="sacarCarta" value="Sacar Carta" disabled>';
                    echo '<input type="submit" name="plantarse" value="Plantarse"></form>';
                } else {
                    echo '<input type="submit" name="sacarCarta" value="Sacar Carta">';
                    echo '<input type="submit" name="plantarse" value="Plantarse"></form>';
                }
                echo '<div><h2>Tus cartas:</h2>';
                mostrarCartas(1);
                echo '<h2>Cartas de la máquina:</h2>';
                mostrarCartas(2);
                echo '</div>';
            ?>
        </div>
        </div>
        <div class="lateral">
            <?php
                echo '<div><span class="jugador">Jugador activo:</span<> Jugador '.$_SESSION['jugadorEnCurso'].'</div>';
                echo '<div><span class="jugador">Puntuación JUGADOR 1: </span>'.$_SESSION['puntuacionJ1'];
                echo '<div><span class="jugador">Puntuación JUGADOR 2 (MÁQUINA): </span>'.$_SESSION['puntuacionJ2'];
                echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="post">';
                echo '<input type="submit" name="reiniciar" value="Reiniciar"></form>';
                if ($_SESSION['finPartida']){
                    switch (comprobarGanador()) {
                        case '0':
                            echo '<div class="resultado">¡Se ha producido un empate!</div>';
                            break;
                        case '1':
                            echo '<div class="resultado">Has ganado el juego</div>';
                            break;
                        case '2':
                            echo '<div class="resultado">La máquina gana la partida.</div>';
                            break;
                    }                
                } else {
                    echo '<div class="resultado">';
                }
            ?>
        </div>
    </div>
</body>
</html>