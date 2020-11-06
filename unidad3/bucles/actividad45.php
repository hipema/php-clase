<?php
// Bloque de documentación
/**
 * Ejercicio 5
 * Calendario
 * 
 * dia = 1
 * mes = 10
 * año = 2020
 * 
 * dia de la semana?
 * 
 * for i = 1  < ndias
 *      donde empiezo
 *      donde salto
 * 
 * L   M   X   J   V   S   D
 *                 1   2   3
 * 4   5   6   7   8   9  10
 * 11 12  13  14  15  16  17
 * 
 * author: manolohidalgo_
 * date: 29-09-2020
 */

    // Iniciación variables
    $diaActual = new DateTime(date('d.m.Y'));
    $dia = $diaActual->format('d');
    $mes = $diaActual->format('m');
    $anyo = $diaActual->format('Y');
    $mesLetra;
    $dias;
    $diaUno = $diaActual;
    date_date_set($diaUno, $anyo, $mes, 1);
    $diaUnoSemana = $diaUno->format('w');

    // Convertimos dia de la semana para empezar con el lunes a 1 y acabar domingo a 7.
    if ($diaUnoSemanaa == 0) {
        $diaUnoSemana = 7;
    }

    // Conversión de mes a Letra
    switch ($mes){
        case 1:
            $mesLetra = 'Enero';
        break;
        case 2:
            $mesLetra = 'Febrero';
        break;
        case 3:
            $mesLetra = 'Marzo';
        break;
        case 4:
            $mesLetra = 'Abril';
        break;
        case 5:
            $mesLetra = 'Mayo';
        break;
        case 6:
            $mesLetra = 'Junio';
        break;
        case 7:
            $mesLetra = 'Julio';
        break;
        case 8:
            $mesLetra = 'Agosto';
        break;
        case 9:
            $mesLetra = 'Septiembre';
        break;
        case 10:
            $mesLetra = 'Octubre';
        break;
        case 11:
            $mesLetra = 'Noviembre';
        break;
        case 12:
            $mesLetra = 'Diciembre';
        break;
    }

    // Cálculo del número de días del mes
    if ($mes == 1 || $mes == 3 || $mes == 5 || $mes == 7 || $mes == 8 || $mes ==10 || $mes == 12){
        $dias = 31;
    } elseif ($mes == 4 || $mes == 6 || $mes == 9 || $mes == 11){
        $dias = 30;
    } elseif ($mes == 2){
         // Calculamos si el año es bisiesto
        if ($year % 400 == 0){
            $bisiesto = true;
        }else if ($year % 100 == 0){
            $bisiesto = false;
        }else if ($year % 4 == 0){
            $bisiesto = true;
        }else{
            $bisiesto = false;
        }
        if ($bisiesto){
            $dias = 29;
        } else {
            $dias = 28;
        }
    }

    
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Ejercicio 5</title>
</head>
<body>
    <h1>Ejercicio 5.</h1>
    <p>Calendario</p>
    <table>
        <?php
            echo '<th colspan=7>'.$mesLetra.' de '.$anyo.'</th>'; 
        ?>
    </tr>
    <?php
    // echo $diaSemanaDelUno;
    // echo $dia.'</br>';
    // echo date_format($diaActual, 'd/m/Y').'</br>';
    // echo $dias.'</br>';
    // echo date_format($diaUno, 'd/m/Y').'</br>';
    // echo $diaUnoSemana.'</br>';
    for ($i = 1; $i<= 7; $i++){
        if ($i == $diaUnoSemana){
            echo '<td>'.$diaUno.'</td>';
            $diaUnoSemana++;
        } else {
            echo '<td></td>';
        }
    }
    ?>
    </table>
</body>
</html>