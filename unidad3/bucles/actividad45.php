<?php
$diaActual = new DateTime(date('d.m.Y'));
$dia = $diaActual->format('d');
$mes = $diaActual->format('m');
$anyo = $diaActual->format('Y');
$diaSemana = $diaActual->format('w');
$diasMes = $diaActual->format('t');

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
    <link rel="stylesheet" href="css/estilo.css">
    <title>Manolo Hidalgo - 2º DAW</title>
</head>
<body>
    <?php
        echo '<h1>Calendario</h1><h2>Día actual: '.$dia.' '.obtenerMesLetra($mes).' '.$anyo.'</h2><br>';
    ?>
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
            do{
                for ($j=0; $j < 7; $j++){
                    if ($imprimirDia <= $diasMes){
                        if ($primerDia != 0){
                            $primerDia--;
                            if ($j == 0) {
                                echo '<tr><td></td>';
                            }else {
                                echo '<td></td>';
                            }
                        } else {
                            if ($j == 6){
                                echo '<td class="sombreado">'.$imprimirDia.'</td></tr>';
                            }else if ($j == 0) {
                                if (in_array($imprimirDia, $festivosMes)) {
                                    echo '<tr><td class="festivo">'.$imprimirDia.'</td>';
                                } else if (in_array($imprimirDia, $festProMes)){
                                    echo '<tr><td class="festivoProvincial">'.$imprimirDia.'</td>';
                                } else if (in_array($imprimirDia, $festLocMes)){
                                    echo '<tr><td class="festivoLocal">'.$imprimirDia.'</td>';
                                } else {
                                    echo '<tr><td>'.$imprimirDia.'</td>';
                                }
                            } else {
                                if (in_array($imprimirDia, $festivosMes)) {
                                    echo '<td class="festivo">'.$imprimirDia.'</td>';
                                } else if (in_array($imprimirDia, $festProMes)){
                                    echo '<td class="festivoProvincial">'.$imprimirDia.'</td>';
                                } else if (in_array($imprimirDia, $festLocMes)){
                                    echo '<td class="festivoLocal">'.$imprimirDia.'</td>';
                                } else {
                                    echo '<td>'.$imprimirDia.'</td>';
                                }
                            }
                            $imprimirDia++;
                        }
                    }
                }
            } while ($imprimirDia < $diasMes);
        ?>
        
        <tr>

    
</body>
</html>