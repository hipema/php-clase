<?php
$diaActual = new DateTime(date('d.m.Y'));
$dia = $diaActual->format('d');
$mes = $diaActual->format('m');
$anyo = $diaActual->format('Y');
$diaSemana = $diaActual->format('w');
$diasMes = $diaActual->format('t');
$diaSeleccionado = [];

if (isset($_GET['dia'])){
    if (checkdate($_GET['mes'], $_GET['dia'], $_GET['anyo'])){
        $diaSeleccionado = [$_GET['dia'], $_GET['mes'], $_GET['anyo']];
    };
}

$festNacionales = array ("Enero" => [1, 6], "Febrero" => [], "Marzo" => [], "Abril" => [],
                         "Mayo" => [1], "Junio" => [], "Julio" => [], "Agosto" => [15],
                         "Septiembre" => [], "Octubre" => [12], "Noviembre" => [1], "Diciembre" => [6, 8, 25]);
$festProvinciales = array ("Enero" => [], "Febrero" => [28], "Marzo" => [], "Abril" => [],
                           "Mayo" => [], "Junio" => [], "Julio" => [], "Agosto" => [],
                           "Septiembre" => [], "Octubre" => [], "Noviembre" => [], "Diciembre" => []);
$festLocal = array("Enero" => [], "Febrero" => [], "Marzo" => [], "Abril" => [],
                   "Mayo" => [], "Junio" => [], "Julio" => [], "Agosto" => [],
                   "Septiembre" => [], "Octubre" => [24], "Noviembre" => [], "Diciembre" => []);

function obtenerMesLetra($mes){
    $arrayMes = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    return $arrayMes[$mes-1];
}

function primerDiaMes($mes, $anyo){
    $fecha = new DateTime();
    $fecha->setDate($anyo, $mes, 1);
    $fecha->format('w');
    if ($fecha->format('w') == 0){
        return 6;
    } else {
        return $fecha->format('w')-1;
    }
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
    <nav><h2>Calendario</h2></nav>
    <div class="ejercicio">
        <?php
        echo '<h3>Día actual: '.$dia.' '.obtenerMesLetra($mes).' '.$anyo.'</h3>';
        ?>
    </div>
    <div class="contenedor">
        <div class="principal">
        <table>
        <tr>
            <th>L</th>
            <th>M</th>
            <th>X</th>
            <th>J</th>
            <th>V</th>
            <th>S</th>
            <th>D</th>
        </tr>
        <?php
            $primerDia = primerDiaMes($mes, $anyo);
            $imprimirDia = 1;
            $festivosMes = $festNacionales[obtenerMesLetra($mes)];
            $festProMes = $festProvinciales[obtenerMesLetra($mes)];
            $festLocMes = $festLocal[obtenerMesLetra($mes)];
            $esDiaSeleccionado = false;
            do{
                for ($j=0; $j < 7; $j++){
                    $clase = $inicioLinea = $finLinea = "";
                    
                    if ($j == 6){
                        $clase = "sombreado";
                        $finLinea = "</tr>";
                    } else if ($j == 0){
                        $inicioLinea = "<tr>";
                    }

                    if (in_array($imprimirDia, $festivosMes)){
                        $clase = "festivo";
                    } else if (in_array($imprimirDia, $festProMes)){
                        $clase = "festivoProvincial";
                    } else if (in_array($imprimirDia, $festLocMes)){
                        $clase = "festivoLocal";
                    }
                    
                    if ($imprimirDia == $dia && ($clase != "")){
                        $clase = "hoyYFestivo";
                    } else if ($imprimirDia == $dia){
                        $clase = "hoy";
                    }

                    if ($imprimirDia <= $diasMes){
                        if ($primerDia != 0){
                            $primerDia--;
                            if ($j == 0) {
                                echo '<tr><td></td>';
                            }else {
                                echo '<td></td>';
                            }
                        } else { 
                            echo $inicioLinea.'<td class="'.$clase.'"><a href="index.php?dia='.$imprimirDia.'&mes='.$mes.'&anyo='.$anyo.'">'.$imprimirDia.'</a></td>'.$finLinea;
                            $imprimirDia++;
                        }
                    }
                }
            } while ($imprimirDia < $diasMes);
        ?></table>
        </div>
        <div class="lateral">
            <?php
                if (!empty($diaSeleccionado)){
                    echo '<h3>Día seleccionado: '.$diaSeleccionado[0].'/'.$diaSeleccionado[1].'/'.$diaSeleccionado[2].'</h3>';
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