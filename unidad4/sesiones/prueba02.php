<?php
session_start();
echo session_id();
if (isset($_SESSION['mensaje'])){
    echo "<br/>".$_SESSION['mensaje'];
} else {
    $_SESSION['mensaje'] = "Hola mundo";
}

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
    <noscript>Esta página necesita tener activado JavaScript para su correcto visionado.</noscript>
    
</body>
</html>