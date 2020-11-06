<?php
/**
 * @author: manolohidalgo_
 * @since: 27-10-2020
 * 
 * $aUsuarios = array(
 *     array('nombre'=>'Jesús','apellido1'=>'Martínez','apellido2'=>'García'),
 *     array('nombre'=>'Mercedes','apellido1'=>'Calamaro','apellido2'=>'Pedrajas'),
 *     array('nombre'=>'Elena','apellido1'=>'Pérez','apellido2'=>''),
 * );
 * Crea un script que utilice una función anónima para generar los nombres de usuarios.
 * El nombre de usuario se forma concatenadndo las dos primeras letras del primer apellido,
 * las dos primeras letras del segundo apellido y la inicial del nombre.
 */

$aUsuarios = array(
        array('nombre'=>'Jesús','apellido1'=>'Martínez','apellido2'=>'García'),
        array('nombre'=>'Mercedes','apellido1'=>'Calamaro','apellido2'=>'Pedrajas'),
        array('nombre'=>'Elena','apellido1'=>'Pérez','apellido2'=>''),
     );

function normalize($string){
    $badChars = 'ÁÉÍÓÚáéíóú';
    $goodChars = 'AEIOUaeiou';
    return utf8_encode(strtolower(strtr(utf8_decode($string), utf8_decode($badChars), $goodChars)));
}

function creaUsuarios($aUsuarios){
    $nombresUsuarios = [];
    $i = 0;
    foreach ($aUsuarios as $indice => $alumno) {
        $nombre = "";
        $apellido1 = "";
        $apellido2 = "";
        foreach ($alumno as $key => $dato) {
            if ($key == 'nombre'){
                $nombre = strtolower(substr($dato,0,1));
            } else if ($key == 'apellido1'){
                $apellido1 = strtolower(substr(normalize($dato), 0, 2));
            } else {
                $apellido2 = strtolower(substr($dato, 0,2));
            }
        }
        $usuario = $apellido1.$apellido2.$nombre;
        array_push($nombresUsuarios, $usuario);
        $i++;
    }
    return $nombresUsuarios;
}

$nombresUsuarios = creaUsuarios($aUsuarios);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="manolohidalgo_"/>
    <title>Manolo Hidalgo - 2º DAW</title>
</head>
<body>
    <?php
        for ($i = 0; $i < sizeof($aUsuarios); $i++){
            echo '<strong>Usuario:</strong> '.$aUsuarios[$i]['nombre'].' '.$aUsuarios[$i]['apellido1'].' '.$aUsuarios[$i]['apellido2'].' - <strong>Nombre Usuario:</strong> '.$nombresUsuarios[$i].'<br/>';
        }
    ?>
</body>
</html>